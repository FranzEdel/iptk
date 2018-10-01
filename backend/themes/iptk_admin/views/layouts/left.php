<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Principal', 'options' => ['class' => 'header']],
                    ['label' => 'Proyectos', 'icon' => 'book', 'url' => ['/proyectos']],
                    ['label' => 'Objetivos', 'icon' => 'tags', 'url' => ['/objetivos']],
                    ['label' => 'Actividades', 'icon' => 'tasks', 'url' => ['/actividades']],
                    ['label' => 'Cronograma Avance', 'icon' => 'dashboard', 'url' => ['/cronograma-av']],
                    ['label' => 'Cronograma Ejecución', 'icon' => 'dashboard', 'url' => ['/cronograma-ej']],
                    ['label' => 'Eventos', 'icon' => 'calendar', 'url' => ['/eventos']],
                    ['label' => 'Gráficos', 'icon' => 'signal', 'url' => ['/graficos']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Administracion',
                        'icon' => 'wrench',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Usuarios', 'icon' => 'user', 'url' => ['/user'],],
                            ['label' => 'historial', 'icon' => 'random', 'url' => ['/debug'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
