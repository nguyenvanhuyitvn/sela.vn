<?php


namespace App\Http\ViewComposers;

use Illuminate\View\View;

class AdminMenuComposer
{

    /** Binding data to view
     *
     * @param  View  $view
     *
     * @return View
     * @throws \Exception
     * */
    public function compose(View $view)
    {
        try {

            $menus = $this->AdminDashboardMenu();

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $menus = [];
        }
       

        return $view->with('menuDashboard', $menus);
    }

    /** Render item game dashboard menu
     *
     * */
    public function AdminDashboardMenu()
    {
        $route = request()->route();
        $menus = [
            [
                'url'    => route('admin.dashboard'),
                'label'  => 'Dashboard',
                'icon'   => '<i class="nav-icon fas fa-tachometer-alt"></i>',
                'prefix' => 'dashboard'
            ],
            [
                'url'    => '',
                'label'  => 'Danh mục',
                'icon'   => '<i class="far fa-folder-open nav-icon"></i>',
                'prefix' => 'category',
                'children' => [
                                [
                                    'url'    => route('admin.category.index'),
                                    'label'  => 'Danh sách',
                                    'icon'   => '<i class="far fa-folder-open nav-icon"></i>',
                                    'prefix' => 'category/list',
                                ],
                                [
                                    'url'    => route('admin.category.create'),
                                    'label'  => 'Thêm mới',
                                    'icon'   => '<i class="far fa-folder-open nav-icon"></i>',
                                    'prefix' => 'category/create',
                                ]
                ]
            ],
            [
                'url'    => '',
                'label'  => 'Thuộc tính',
                'icon'   => '<i class="far fa-folder-open nav-icon"></i>',
                'prefix' => 'attribute',
                'children' => [
                                [
                                    'url'    => route('admin.attribute.list'),
                                    'label'  => 'Danh sách',
                                    'icon'   => '<i class="far fa-folder-open nav-icon"></i>',
                                    'prefix' => 'attribute/list',
                                ],
                                [
                                    'url'    => route('admin.attribute.create'),
                                    'label'  => 'Thêm mới',
                                    'icon'   => '<i class="far fa-folder-open nav-icon"></i>',
                                    'prefix' => 'attribute/create',
                                ]
                ]
            ],
            [
                'url'    => '',
                'label'  => 'Sản phẩm',
                'icon'   => '<i class="far fa-folder-open nav-icon"></i>',
                'prefix' => 'product',
                'children' => [
                                [
                                    'url'    => route('admin.product.index'),
                                    'label'  => 'Danh sách',
                                    'icon'   => '<i class="far fa-folder-open nav-icon"></i>',
                                    'prefix' => 'product/list',
                                ],
                                [
                                    'url'    => route('admin.product.create'),
                                    'label'  => 'Thêm mới',
                                    'icon'   => '<i class="far fa-folder-open nav-icon"></i>',
                                    'prefix' => 'product/create',
                                ]
                ]
            ]

         ];
        //  print_r($route->uri) ;
        $menus = array_map(function ($menu) use ($route) {
            $menu['active'] = (strpos($route->uri, $menu['prefix']) !== false) ? 'active' : '';
            if ($menu['prefix'] === 'admin') {
                $menu['active'] = ($route->uri === $menu['prefix']) ? 'active' : '';
            }
            $menu['class'] = '';
            if (isset($menu['children'])) {
                $menu['class'] = 'has-treeview';
                $children      = [];
                foreach ($menu['children'] as $child) {
                    $child['active'] = (strpos($route->uri, $child['prefix']) !== false) ? 'active' : '';
                    $menu['class']   .= ($child['active'] === 'active') ? ' menu-open' : '';
                    $children[]      = $child;
                }
                $menu['children'] = $children;

            }

            return $menu;
        }, $menus);
        return $menus;
    }
}
