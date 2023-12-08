<?php
return [
    [
        'name' => 'Quản lý đơn hàng',
        'list-check' => ['transaction'],
        'icon' => 'fas fa-cart-plus',
        'route' => 'admin.transaction.index',
    ],
    [
        'name' => 'Quản lý sản phẩm',
        'list-check' => ['category', 'producer', 'type', 'attribute', 'keyword', 'product', 'discount-code'],
        'icon' => 'fa fa-database',
        'sub'  => [
            [
                'name'  => 'Danh Mục',
                'namespace' => 'category',
                'route' => 'admin.category.index',
                'icon'  => 'fa fa-list'
            ],
            [
                'name'  => 'Nhà cung cấp',
                'namespace' => 'producer',
                'route' => 'admin.producer.index',
                'icon'  => 'fa fa-truck'
            ],
//            [
//                'name'  => 'Kiểu dữ liệu',
//                'namespace' => 'type',
//                'route' => 'admin.type.index',
//                'icon'  => 'fa fa-bookmark'
//            ],
            [
                'name'  => 'Màu sắc - Kích thước',
                'namespace' => 'attribute',
                'route' => 'admin.attribute.index',
                'icon'  => 'fa fa-eraser'
            ],
            // [
            //     'name'  => 'Keyword',
            //     'namespace' => 'keyword',
            //     'route' => 'admin.keyword.index',
            //     'icon'  => 'fa fa-key'
            // ],
            [
                'name'  => 'Quản lý kho',
                'namespace' => 'product',
                'route' => 'admin.product.index',
                'icon'  => 'fa fa-binoculars'
            ],
            [
                'name'  => 'Mã giảm giá',
                'namespace' => 'discount-code',
                'route' => 'admin.discount.code.index',
                'icon'  => 'fa fa-arrow-down'
            ],
        ]
    ],
    
    // [
    //     'name' => 'Quản lý bài viết',
    //     'list-check' => ['article'],
    //     'icon' => 'fa-file-word',
    //     'route' => 'admin.article.index',
    // ],
    [
        'name' => 'Quản lý bài viết',
        'list-check' => ['menu','article'],
        'icon' => 'fa-file-word',
        'sub'  => [
            [
                'name'  => 'Danh mục',
                'namespace' => 'menu',
                'route' => 'admin.menu.index',
                'icon'  => 'fa fa-window-restore'
            ],
            [
                'name'  => 'Bài viết',
                'namespace' => 'article',
                'route' => 'admin.article.index',
                'icon'  => 'fa-file-word'
            ],
        ]
    ],
    // [
    //     'name' => 'Quản lý tài khoản',
    //     'list-check' => ['user','rating','comment','contact'],
    //     'icon' => 'fa fa-user',
    //     'sub'  => [
    //         [
    //             'name'  => 'Thành viên',
    //             'route' => 'admin.user.index',
    //             'namespace' => 'user',
    //             'icon'  => 'fa fa-user'
    //         ],
    //         [
    //             'name'  => 'Đánh giá',
    //             'namespace' => 'rating',
    //             'route' => 'admin.rating.index',
    //             'icon'  => 'fa fa-star'
    //         ],
    //         // [
    //         //     'name'  => 'Bình luận',
    //         //     'namespace' => 'comment',
    //         //     'route' => 'admin.comment.index',
    //         //     'icon'  => 'fa-comments'
    //         // ],
    //         // [
    //         //     'name'  => 'Liên hệ',
    //         //     'namespace' => 'contact',
    //         //     'route' => 'admin.contact',
    //         //     'icon'  => 'fas fa-envelope-open-text'
    //         // ],
    //     ]
    // ],
    [
        'name' => 'Quản lý liên hệ',
        'list-check' => ['contact'],
        'icon' => 'fas fa-envelope-open-text',
        'route' => 'admin.contact',
    ],
    [
        'name' => 'Quản lý tài khoản',
        'list-check' => ['user'],
        'icon' => 'fa fa-user',
        'route' => 'admin.user.index',
    ],
    [
        'name' => 'Quản lý đánh giá',
        'list-check' => ['rating'],
        'icon' => 'fa fa-star',
        'route' => 'admin.rating.index',
    ],
   
    [
        'name' => 'Cài đặt',
        'list-check' => ['slide','event','static','statistical'],
        'icon' => 'fas fa-cog',
        'sub'  => [
            [
                'name'  => 'Banner',
                'namespace' => 'slide',
                'route' => 'admin.slide.index',
                'icon'  => 'far fa-circle'
            ],
            [
                'name'  => 'Sự kiện',
                'namespace' => 'event',
                'route' => 'admin.event.index',
                'icon'  => 'far fa-circle'
            ],
            [
                'name'  => 'Trang tĩnh',
                'namespace' => 'static',
                'route' => 'admin.static.index',
                'icon'  => 'far fa-circle'
            ],
            [
                'name'  => 'Thống kê',
                'namespace' => 'statistical',
                'route' => 'admin.statistical',
                'icon'  => 'far fa-circle'
            ],
        ]
    ],
    [
        'name'  => 'System',
        'label' => 'true'
    ]
];
