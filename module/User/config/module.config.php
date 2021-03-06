<?php

namespace User;

use User\Factory\RegisterFactory;
use User\Factory\RegisterControllerFactory;
use User\Factory\IndexControllerFactory;
use User\Factory\UserFactory;
use User\Form\LoginForm;
use User\Form\RegisterForm;

return array(
    'router' => array(
        'routes' => array(
            'user-page' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/utilisateur',
                    'defaults' => array(
                        '__NAMESPACE__' => 'User\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
            ),
            'login' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/connexion',
                    'defaults' => array(
                        '__NAMESPACE__' => 'User\Controller',
                        'controller'    => 'Register',
                        'action'        => 'login',
                    ),
                ),
            ),
            'logout' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/deconnexion',
                    'defaults' => array(
                        '__NAMESPACE__' => 'User\Controller',
                        'controller'    => 'Register',
                        'action'        => 'logout',
                    ),
                ),
            ),
            'register' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/inscription',
                    'defaults' => array(
                        '__NAMESPACE__' => 'User\Controller',
                        'controller'    => 'Register',
                        'action'        => 'register',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'User\Controller\Register'  => RegisterControllerFactory::class,
            'User\Controller\Index'     => IndexControllerFactory::class,
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Register'      => RegisterFactory::class,
            'User'          => UserFactory::class,
        ),
    ),
    'form_elements' => array(
        'invokables' => array(
            'registerForm'  => RegisterForm::class,
            'loginForm'     => LoginForm::class,
        ),
    ),
    'view_helpers' => [
        'factories' => [
            'user'    => \User\View\Helper\Factory\UserFactory::class,
        ],
    ],
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
            'zfcuser' => __DIR__ . '/../view',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),

            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver',
                ),
            ),
        ),
    ),
);
