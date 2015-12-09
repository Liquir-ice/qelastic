<?php

namespace Liquirice\Qelastic;

use Illuminate\Container\Container;

use Carbon\Carbon;

class Qelastic
{
    protected $app;

    public function __construct(Container $container)
    {
        $this->app = $container;
    }

    public function pushToQueue(array $condition)
    {

        $config = config("es_config");

        $data =  array(
            'user_id' => '',
            'action' => '',
            'object' => '',
            'object_id' => '',
            'param' => '',
            'ip' => \Request::getClientIp(),
            'timestamp' => Carbon::now()->timestamp,
        );

        if (isset($condition) && !empty($condition)) {
            $data = array_merge($data, $condition);
        }

        $settings = array(
            'index' => 'dm-'. Carbon::now()->year .'.'. Carbon::now()->month,
            'type' => 'user',
            'body' => $data,
        );

        \Queue::push($config["path"],$settings);
    }


}
