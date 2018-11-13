<aside class="main-sidebar">

    <section class="sidebar">

        

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Principal', 'options' => ['class' => 'header']],
                    ['label' => 'Proyectos', 'icon' => 'book', 'url' => ['/proyectos']],
                    ['label' => 'Objetivos', 'icon' => 'tags', 'url' => ['/objetivos']],
                    ['label' => 'Resultados', 'icon' => 'cog', 'url' => ['/resultados']],
                    ['label' => 'Indicadores', 'icon' => 'leaf', 'url' => ['/indicadores']],
                    ['label' => 'Actividades', 'icon' => 'tasks', 'url' => ['/actividades']],
                    [
                        'label' => 'Seguimiento al Avance',
                        'icon' => 'align-left',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Cronograma Avance', 'icon' => 'dashboard', 'url' => ['/cronograma-av'],],
                            ['label' => 'PAT Avance', 'icon' => 'tasks', 'url' => ['/cronograma-av/patav'],],
                        ],
                    ],
                    [
                        'label' => 'Seguimiento Financiero',
                        'icon' => 'usd',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Cronograma Ejecución', 'icon' => 'dashboard', 'url' => ['/cronograma-ej'],],
                            ['label' => 'PAT Ejecución', 'icon' => 'usd', 'url' => ['/cronograma-ej/patej'],],
                        ],
                    ],
                    ['label' => 'Eventos', 'icon' => 'calendar', 'url' => ['/eventos']],
                    ['label' => 'Gráficos', 'icon' => 'signal', 'url' => ['/graficos']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Administracion',
                        'icon' => 'wrench',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Usuarios', 'icon' => 'user', 'url' => ['/user'],],
                            ['label' => 'Recursos Humanos', 'icon' => 'euro', 'url' => ['/user'],],
                            ['label' => 'historial', 'icon' => 'random', 'url' => ['/debug'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
