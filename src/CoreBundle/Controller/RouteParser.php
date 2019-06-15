<?php

namespace CoreBundle\Controller;

/**
 * Class RouteParser
 *
 * @package CoreBundle\Controller
 */
class RouteParser
{
    /**
     * @const string
     */
    private const DEFAULT_CONTROLLER = 'Default';

    /**
     * @const string
     */
    private const DEFAULT_ACTION = 'index';

    /**
     * @param Request $request
     *
     * @return void
     *
     * @throws \Exception
     */
    public static function init(Request $request): void
    {
       self::parse($request);
    }

    /**
     * @param Request $request
     */
    private function parse(Request $request): void
    {
        $controllerName = null;
        $nameSpace = __NAMESPACE__;
        $actionName = self::DEFAULT_ACTION;
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (count($routes) > 2) {
            [$delimiter, $controllerName, $actionName] = $routes;
            $controllerName = self::getSanitizedName($controllerName);
        }

        if (count($routes) === 2) {
            [$delimiter, $controllerName] = $routes;

            if (!empty($controllerName)){
                $controllerName = self::getSanitizedName($controllerName);
            }

            if (empty($controllerName) || $controllerName === null){
                $controllerName = self::DEFAULT_CONTROLLER;
            }
        }

        $actionName = self::getSanitizedName($actionName, true);

        if ($controllerName === 'Payment'){
            $nameSpace = 'PaymentsBundle\\Controller';
        }

        $controller = '\\' . $nameSpace .'\\'.$controllerName.'Controller';
        $controller = new $controller;
        $controller->$actionName($request);

    }

        /**
         * @param      $name
         * @param bool $isModel
         *
         * @return string
         */
        private static function getSanitizedName($name, $isModel = false) : string
    {
        if ($isModel) {
            return strtolower(trim($name));
        }

        return ucfirst(strtolower(trim(substr($name, 0, -1))));
    }
}
