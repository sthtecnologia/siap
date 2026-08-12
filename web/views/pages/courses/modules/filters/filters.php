<!-- =====================================
Filter
====================================== -->

<div class="card mb-4">
    <a href="javascript::" style="color: unset;">
        <div class="card-header filter-card-header" id="headingOne" data-toggle="collapse"
            data-target="#collapseFilter" aria-expanded="true" aria-controls="collapseFilter">
            <h6 class="mb-0">
                Filter <i class="fas fa-sliders-h" style="float: right;"></i>
            </h6>
        </div>
    </a>
    <div id="collapseFilter" class="collapse show" aria-labelledby="headingOne"
        data-parent="#accordion">
        <div class="card-body pt-0">
            
            <div class="filter_type">
                <h6>Categories</h6>
                <ul>
                    <li class="ms-2">
                        <div class="">
                            <input type="radio" id="category_all" name="item_filter"
                                class="custom-radio changeFilters" value="_All" filter="All">
                            <label for="category_all">All category</label>
                        </div>
                    </li>

                    <?php if (!empty($categories)): ?>

                        <?php foreach ($categories as $key => $value): ?>

                            <li class="">

                                <div class="d-flex justify-content-between">

                                    <div class="">
                                        <input type="radio" id="category-<?php echo $value->id_category ?>" name="item_filter" filter="Categories" class="custom-radio changeFilters" value="<?php echo $value->url_category ?>_<?php echo urldecode($value->title_category) ?>">
                                        <label for="category-<?php echo $value->id_category ?>"><?php echo urldecode($value->title_category) ?></label>
                                    </div>

                                    <div class="text-muted">
                                        <a data-bs-toggle="collapse" href="#collapse<?php echo $key ?>">
                                            <i class="fas fa-chevron-down"></i>
                                        </a>
                                    </div>

                                </div>

                            </li>

                            <?php if (!empty($value->subcategories)): ?>

                                <?php foreach ($value->subcategories as $index => $item): ?>

                                    <div id="collapse<?php echo $key ?>" class="collapse">

                                        <li class="ms-3">
                                            <div class="">
                                                <input type="radio" id="sub_category-<?php echo $item->id_subcategory ?>" name="item_filter" filter="Subcategories" class="custom-radio changeFilters" value="<?php echo $item->url_subcategory ?>_<?php echo urldecode($item->title_subcategory) ?>">
                                                <label for="sub_category-<?php echo $item->id_subcategory ?>"><?php echo urldecode($item->title_subcategory) ?></label>
                                            </div>
                                        </li>

                                    </div>

                                <?php endforeach ?>

                            <?php endif ?>

                        <?php endforeach ?>

                    <?php endif ?>
                    
                </ul>
               
            </div>

            <hr>
            
            <div class="filter_type">
                <div class="mb-3">
                    <h6>Price</h6>
                    <ul>
                        <li>
            
                            <div class="">
                                <input type="radio" id="price_free" name="item_filter" filter="Prices"
                                    class="custom-radio changeFilters" value="0_Cursos Gratis">
                                <label for="price_free">Free</label>
                            </div>
                            <div class="">
                                <input type="radio" id="price_paid" name="item_filter" filter="Prices"
                                    class="custom-radio changeFilters" value="$_Cursos Pagos">
                                <label for="price_paid">Paid</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
