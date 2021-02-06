<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,
		'filteradmin' => \App\Filters\FilterAdmin::class,
		'filterlecture' => \App\Filters\FilterLecture::class,
		'filterstudent' => \App\Filters\FilterStudent::class,
	];

	// Always applied before every request
	public $globals = [
		'before' => [
			'filteradmin' => [
				'except' => [
					'auth', 'auth/*',
					'home', 'home/*',
					'/'
				]
				],
				'filterlecture' => [
					'except' => [
						'auth', 'auth/*',
						'home', 'home/*',
						'/'
					]
					],
			'filterstudent' => [
				'except' => [
					'auth', 'auth/*',
					'home', 'home/*',
					'/'
				]
				],
			
			//'honeypot'
			// 'csrf',
		],
		'after'  => [
			'filteradmin' => [
				'except' => [
					'home', 'home/*',
					'admin', 'admin/*',
					'faculty', 'faculty/*',
					'building', 'building/*',
					'room', 'room/*',
					'prodi', 'prodi/*',
					'ay', 'ay/*',
					'courses', 'courses/*',
					'student', 'student/*',
					'lecture', 'lecture/*',
					'classes', 'classes/*',
					'user', 'user/*',
					'collegeschedule', 'collegeschedule/*',
					'/'
				]
			],
			'filterlecture' => [
				'except' => [
					'ltr', 'ltr/*',
					'home', 'home/*',
					'/'
				]
			],
			'filterstudent' => [
				'except' => [
					'sdn', 'sdn/*',
					'home', 'home/*',
					'css', 'css/*',
					'src', 'src/*',
					'/'
				]
			],
			
			'toolbar',
			//'honeypot'
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [];
}
