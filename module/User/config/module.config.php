<?php

namespace User;

use User\Factory\RegisterControllerFactory;
use User\Form\RegisterForm;

return array(
    'router' => array(
        'routes' => array(
            'register' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/utilisateur/inscription',
                    'defaults' => array(
                        '__NAMESPACE__' => 'User\Controller',
                        'controller'    => 'register',
                        'action'        => 'register',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'User\Controller\Register' => RegisterControllerFactory::class,
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            //'SmsNodhos'       => 'Sms\Factory\SmsFactory',
        ),
    ),
    'form_elements' => array(
        'invokables' => array(
            'registerForm' => RegisterForm::class,
        ),
    ),
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
