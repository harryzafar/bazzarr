<!-- breadcrumb start -->
<div class="breadcrumb">
            <div class="container">
                <ul class="list-unstyled d-flex align-items-center m-0">
                    <li><a href="<?php echo base_url();?>">Home</a></li>
                    <li>
                        <svg class="icon icon-breadcrumb" width="64" height="64" viewBox="0 0 64 64" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.4">
                                <path
                                    d="M25.9375 8.5625L23.0625 11.4375L43.625 32L23.0625 52.5625L25.9375 55.4375L47.9375 33.4375L49.3125 32L47.9375 30.5625L25.9375 8.5625Z"
                                    fill="#000" />
                            </g>
                        </svg>
                    </li>
                    <li>Shop</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb end -->

        <main id="MainContent" class="content-for-layout">
            <div class="collection mt-100">
                <div class="container">
                    <div class="row flex-row-reverse">
                        <!-- product area start -->
                        <div class="col-lg-9 col-md-12 col-12">
                            <div class="filter-sort-wrapper d-flex justify-content-between flex-wrap">
                                <div class="collection-title-wrap d-flex align-items-end">
                                    <h2 class="collection-title heading_24 mb-0">All products</h2>
                                    <p class="collection-counter text_16 mb-0 ms-2" id="total_pro"></p>
                                </div>
                                <div class="filter-sorting">
                                    <div
                                        class="filter-drawer-trigger mobile-filter d-flex align-items-center d-lg-none">
                                        <span class="mobile-filter-icon me-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="icon icon-filter">
                                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                            </svg>
                                        </span>
                                        <span class="mobile-filter-heading">Filter and Sorting</span>
                                    </div>
                                </div>
                            </div>
                            <div class="collection-product-container">
                                <div class="row filter_data">
                                   
                                </div>
                            </div>
                            <div class="pagination justify-content-center mt-100">
                                <nav id="pagination_links">
                                    
                                    
                                </nav>
                            </div>
                        </div>
                        <!-- product area end -->
                        <!-- sidebar start -->
                        <div class="col-lg-3 col-md-12 col-12">
                            <div class="collection-filter filter-drawer">
                                <div class="filter-widget d-lg-none d-flex align-items-center justify-content-between">
                                    <h5 class="heading_24">Filter By</h4>
                                        <button type="button"
                                            class="btn-close text-reset filter-drawer-trigger d-lg-none"></button>
                                </div>
                                <div class="filter-widget">
                                    <div class="filter-header faq-heading heading_18 d-flex align-items-center justify-content-between border-bottom"
                                        data-bs-toggle="collapse" data-bs-target="#filter-collection">
                                        Categories
                                        <span class="faq-heading-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="icon icon-down">
                                                <polyline points="6 9 12 15 18 9"></polyline>
                                            </svg>
                                        </span>
                                    </div>
                                    <div id="filter-collection" class="accordion-collapse collapse show">
                                        <ul class="filter-lists list-unstyled mb-0">
                                            <?php foreach($categories as $category){;?>
                                                <li class="filter-item">
                                                <label class="filter-label">
                                                    <input type="checkbox" class="common_selector category" value="<?php echo $category['name'];?>">
                                                    <span class="filter-checkbox rounded me-2"></span>
                                                    <span class="filter-text"><?php echo $category['name'];?></span>
                                                </label>
                                            </li>
                                            <?php }
                                            ;?>
                                        </ul>
                                    </div>
                                </div>
                               
                                <div class="filter-widget">
                                    <div class="filter-header faq-heading heading_18 d-flex align-items-center justify-content-between border-bottom"
                                        data-bs-toggle="collapse" data-bs-target="#filter-size">
                                        Brands
                                        <span class="faq-heading-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="icon icon-down">
                                                <polyline points="6 9 12 15 18 9"></polyline>
                                            </svg>
                                        </span>
                                    </div>
                                    <div id="filter-size" class="accordion-collapse collapse show">
                                        <ul class="filter-lists list-unstyled mb-0">
                                            <?php foreach($brands as $brand){;?>
                                                <li class="filter-item">
                                                <label class="filter-label">
                                                    <input type="checkbox" class="common_selector brand" value="<?php echo $brand['brand'];?>">
                                                    <span class="filter-checkbox rounded me-2"></span>
                                                    <span class="filter-text"><?php echo $brand['brand']; ?></span>
                                                </label>
                                            </li>
                                            <?php } 
                                            ;?>
                                            
                                        </ul>
                                    </div>
                                </div>

                                <div class="filter-widget">
                                    <div class="filter-header faq-heading heading_18 d-flex align-items-center justify-content-between border-bottom"
                                        data-bs-toggle="collapse" data-bs-target="#filter-price">
                                        Price
                                        <span class="faq-heading-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="icon icon-down">
                                                <polyline points="6 9 12 15 18 9"></polyline>
                                            </svg>
                                        </span>
                                    </div>
                                    <div id="filter-price" class="accordion-collapse collapse show">
                                        <div class="filter-price d-flex align-items-center justify-content-between">
                                            <div class="filter-field">
                                                <input class="field-input price" type="number" id="min_price" value="100" placeholder="0" min="0">
                                            </div>
                                            <div class="filter-separator px-3">To</div>
                                            <div class="filter-field">
                                                <input class="field-input price" type="number" id="max_price" value="5000" min="1" placeholder="5000">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                                              
                            </div>
                        </div>
                        <!-- sidebar end -->
                    </div>
                </div>
            </div>
        </main>
<script>
  $(document).ready(function(){
        filter_data(1);

        function filter_data(page){
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var category = get_filter('category');
        var brand = get_filter('brand');
        var min_price = $('#min_price').val();
        var max_price = $('#max_price').val();
        // for search query
        var search = "<?php if($this->input->get('search')){
            echo strip_tags($this->input->get('search'));
        }
        ;?>";
        
        
        $.ajax({
            url : "<?php echo base_url();?>shop/fetch_data/" + page,
            method : "POST",
            dataType: "JSON",
            data : {action:action, category:category, brand:brand, min_price, max_price, search},
            success: function(data){
                $('.filter_data').html(data.product_list);
                $('#pagination_links').html(data.pagination_links);
                $('#total_pro').html('('+data.total_pro+')');
            }
        })
        }

        function get_filter(classname){
            var filter = [];
           $('.' + classname + ':checked').each(function(){
            filter.push($(this).val());
           });
           return filter;
        }

        $('.common_selector').click(function () {
                filter_data(1);
        });
        
       $('.price').on('input', function(){
         filter_data(1);
       })

        $(document).on('click', '.pagination li a', function (event) {
            event.preventDefault();
            var page = $(this).data('ci-pagination-page');
            filter_data(page);
        });

        

    }) 
</script>       