<?php

/*=============================================
Categorias
=============================================*/

$url = "categories?linkTo=status_category&equalTo=1";
$method = "GET";
$fields = array();

$getCategories = CurlController::request($url,$method,$fields);

if($getCategories->status == 200){

    $categories = $getCategories->results;

    /*=============================================
    Subcategorias
    =============================================*/

    foreach ($categories as $key => $value) {
        
        $url = "subcategories?linkTo=status_subcategory,id_category_subcategory&equalTo=1,".$value->id_category;

        $getSubcategories = CurlController::request($url,$method,$fields);

        if($getSubcategories->status == 200){

            $value->subcategories = $getSubcategories->results;
        
        }else{

            $value->subcategories = array();

        }
    }

}else{

    $categories = array();
}

?>

<div class="main-nav-wrap">

    <div class="mobile-overlay"></div>

    <ul class="mobile-main-nav">

        <div class="mobile-menu-helper-top"></div>

        <li class="has-children">

            <!-- =====================================
            Courses
            ====================================== -->

            <a href="#">
                <i class="fas fa-th d-inline"></i>
                <span>Courses</span>
                <span class="has-sub-category">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>

            <ul class="category corner-triangle top-left is-hidden">

                <li class="go-back">
                    <a href="#">
                        <i class="fas fa-angle-left"></i>
                        Menu
                    </a>
                </li>

                <?php if (!empty($categories)): ?>

                    <?php foreach ($categories as $key => $value): ?>

                        <li class="has-children">

                            <a href="/courses/<?php echo urldecode($value->url_category) ?>">
                                <span class="icon">
                                    <?php echo urldecode($value->icon_category) ?>
                                </span>
                                <span><?php echo urldecode($value->title_category) ?></span>
                                <span class="has-sub-category">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>

                            <ul class="sub-category is-hidden">
                                <li class="go-back-menu">
                                    <a href="#">
                                        <i class="fas fa-angle-left"></i>
                                        Menu
                                    </a>
                                </li>
                                <li class="go-back">
                                    <a href="/courses/<?php echo urldecode($value->url_category) ?>">
                                        <i class="fas fa-angle-left"></i>
                                        <span class="icon">
                                            <?php echo urldecode($value->icon_category) ?>
                                        </span>
                                         <?php echo urldecode($value->title_category) ?>
                                    </a>
                                </li>

                                <?php if (!empty($value->subcategories)): ?>

                                    <?php foreach ($value->subcategories as $index => $item): ?>

                                        <li>
                                            <a href="/courses/<?php echo urldecode($item->url_subcategory) ?>"><?php echo urldecode($item->title_subcategory) ?></a>
                                        </li>
                                        
                                    <?php endforeach ?>
                                    
                                <?php endif ?>   
                              
                            </ul>

                        </li>
                                
                    <?php endforeach ?>
                    
                <?php endif ?>

                <!-- =====================================
                Todos los cursos
                ====================================== -->

                <li class="all-category-devided">
                    <a href="/courses">
                        <span class="icon">
                            <i class="fa fa-align-justify"></i>
                        </span>
                        <span>All courses</span>
                    </a>
                </li>

            </ul>

        </li>

        <div class="mobile-menu-helper-bottom"></div>

    </ul>

</div>