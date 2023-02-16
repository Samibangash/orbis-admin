<?php

use App\Models\Branch;
use App\Models\Warehouse;

function warehouse($id) {
    return Warehouse::find($id);
}

function branch($id) {
    return Branch::find($id);
}

function statusLable($id){
    if($id == 1) {
        return "Enable";
    } elseif($id == 0) {
        return "Disable";
    }
}


function activeMenu($uri = '') {
    $active = '';
    if (Request::is(Request::segment(1) . '/' . $uri . '/*') || Request::is(Request::segment(1) . '/' . $uri) || Request::is($uri)) {
        $active = 'menu-item-active';
    }
    return $active;
}

function activeMenuTop($uri = '') {
    $activeTop = '';
    if (Request::is(Request::segment(1) . '/' . $uri . '/*') || Request::is(Request::segment(1) . '/' . $uri) || Request::is($uri)) {
        $activeTop = 'menu-item-open menu-item-here';
    }
    return $activeTop;
}

function mainManu() {

    $menu = "";
    $menu .= '<ul class="menu-nav">';
    $menu .= '<li class="menu-item '.activeMenu('home*').'" aria-haspopup="true">
    <a href="'.route('home').'" class="menu-link">
    <span class="menu-text">Dashboard</span>
    </a>
    </li>';

    $menu .= '<li class="menu-item menu-item-submenu menu-item-rel '.activeMenu('catalog*').'" data-menu-toggle="click" aria-haspopup="true">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="menu-text">Catalog</span>
        <span class="menu-desc"></span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu menu-submenu-classic menu-submenu-left">
        <ul class="menu-subnav">
            <li class="menu-item '.activeMenu('category*').'" aria-haspopup="true">
                <a href="'.route('catalog.category.list').'" class="menu-link">
                <span class="svg-icon menu-icon">
                    <i class="fab la-app-store-ios"></i>
                </span>
                <span class="menu-text">Categories</span>
                </a>
            </li>
            <li class="menu-item '.activeMenu('brand*').'" aria-haspopup="true">
                <a href="'.route('catalog.brand.list').'" class="menu-link">
                <span class="svg-icon menu-icon">
                    <i class="fab la-canadian-maple-leaf"></i>
                </span>
                <span class="menu-text">Brands</span>
                </a>
            </li>
            <li class="menu-item '.activeMenu('items*').'" aria-haspopup="true">
                <a href="'.route('catalog.product.list').'" class="menu-link">
                <span class="svg-icon menu-icon">
                    <i class="fab la-product-hunt"></i>
                </span>
                <span class="menu-text">Products</span>
                </a>
            </li>


            <li class="menu-item '.activeMenu('departments*').'" aria-haspopup="true" style="display:none;">
                <a href="'.route('departments').'" class="menu-link">
                <span class="svg-icon menu-icon">
                    <i class="fab la-dochub"></i>
                </span>
                <span class="menu-text">Departments</span>
                </a>
            </li>
        </ul>
    </div>
</li>';

//    $menu .= '<li class="menu-item '.activeMenu('purchase*').'" aria-haspopup="true">
//    <a href="'.route('purchase_index').'" class="menu-link">
//    <span class="menu-text">Purchase</span>
//    </a>
//    </li>';

    $menu .= '<li class="menu-item menu-item-submenu menu-item-rel '.activeMenu('inventory.*').'" data-menu-toggle="click" aria-haspopup="true">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="menu-text">Inventory</span>
        <span class="menu-desc"></span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu menu-submenu-classic menu-submenu-left">
        <ul class="menu-subnav">
            <li class="menu-item '.activeMenu('pr.*').'" aria-haspopup="true">
                <a href="'.route('inventory.pr.list').'" class="menu-link">
                <span class="svg-icon menu-icon">
                    <i class="la la-clipboard"></i>
                </span>
                <span class="menu-text">Purchase Requisition</span>
                </a>
            </li>

            <li class="menu-item '.activeMenu('po.*').'" aria-haspopup="true">
                <a href="'.route('inventory.po.list').'" class="menu-link">
                <span class="svg-icon menu-icon">
                    <i class="la la-clipboard-check"></i>
                </span>
                <span class="menu-text">Purchase Order</span>
                </a>
            </li>

            <li class="menu-item '.activeMenu('warehouse.*').'" aria-haspopup="true">
                <a href="'.route('warehousing.warehouse.list').'" class="menu-link">
                <span class="svg-icon menu-icon">
                    <i class="la la-clipboard-list"></i>
                </span>
                <span class="menu-text">Goods Received Note</span>
                </a>
            </li>

        </ul>
    </div>
</li>';

    $menu .= '<li class="menu-item menu-item-submenu menu-item-rel '.activeMenu('warehousing.*').'" data-menu-toggle="click" aria-haspopup="true">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="menu-text">Warehousing</span>
        <span class="menu-desc"></span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu menu-submenu-classic menu-submenu-left">
        <ul class="menu-subnav">
            <li class="menu-item '.activeMenu('warehouse.*').'" aria-haspopup="true">
                <a href="'.route('warehousing.warehouse.list').'" class="menu-link">
                <span class="svg-icon menu-icon">
                    <i class="la la-store-alt"></i>
                </span>
                <span class="menu-text">Warehouse</span>
                </a>
            </li>

            <li class="menu-item '.activeMenu('warehouse.*').'" aria-haspopup="true">
                <a href="'.route('warehousing.location.list').'" class="menu-link">
                <span class="svg-icon menu-icon">
                    <i class="la la-store-alt"></i>
                </span>
                <span class="menu-text">Location</span>
                </a>
            </li>

            <li class="menu-item '.activeMenu('branch.*').'" aria-haspopup="true">
                <a href="'.route('warehousing.branch.list').'" class="menu-link">
                <span class="svg-icon menu-icon">
                    <i class="la la-th"></i>
                </span>
                <span class="menu-text">Branch</span>
                </a>
            </li>

        </ul>
    </div>
</li>';

    $menu .= '<li class="menu-item menu-item-submenu menu-item-rel '.activeMenu('system.*').'" data-menu-toggle="click" aria-haspopup="true">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="menu-text">System</span>
        <span class="menu-desc"></span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu menu-submenu-classic menu-submenu-left">
        <ul class="menu-subnav">
            <li class="menu-item '.activeMenu('tax.*').'" aria-haspopup="true">
                <a href="'.route('system.tax.list').'" class="menu-link">
                <span class="svg-icon menu-icon">
                    <i class="la la-paperclip"></i>
                </span>
                <span class="menu-text">Tax</span>
                </a>
            </li>

            <li class="menu-item '.activeMenu('supplier.*').'" aria-haspopup="true">
                <a href="'.route('system.supplier.list').'" class="menu-link">
                <span class="svg-icon menu-icon">
                    <i class="la la-user-tag"></i>
                </span>
                <span class="menu-text">Suppliers</span>
                </a>
            </li>

        </ul>
    </div>
</li>';

//    $menu .= '<li class="menu-item '.activeMenu('reports*').'" aria-haspopup="true">
//    <a href="'.route('reports_index').'" class="menu-link">
//    <span class="menu-text">Reports</span>
//    </a>
//    </li>';

    $menu .= '</ul>';
    echo $menu;

}
