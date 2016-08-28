<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use EasyWeChat\Foundation\Application;

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function server()
	{
		$options = [
		    'debug'  => true,
		    'app_id' => 'wxxxxxxxxxxxxxxxxxx',
		    'secret' => 'f77xxxxxxxxxxxxxxxxxxxxx',
		    'token'  => 'xxxxxxxx',
		    'aes_key' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', // 可选
		    'log' => [
		        'level' => 'debug',
		        'file'  => '/tmp/easywechat.log', // XXX: 绝对路径！！！！
		    ]
		];

		$app = new Application($options);
		// 从项目实例中得到服务端应用实例。
		$server = $app->server;
		$server->setMessageHandler(function ($message) {
		    // $message->FromUserName // 用户的 openid
		    // $message->MsgType // 消息类型：event, text....
		    return "您好！欢迎关注我!";
		});
		$response = $server->serve();
		$response->send();
	}
}
