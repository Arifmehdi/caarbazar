<!-- Modal -->
<div class="modal fade" id="QuickModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div style="height:70px" class="modal-header d-flex justify-content-center align-items-center">
                <p style="font-size:19px; margin-top:10px; fone-weight:600" class="modal-title mb-3">Quick View</p>
                <button style="margin-top:-15px" type="button" class="btn-close position-absolute end-0 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row justify-content-center">
                    <div style="margin-top:1px" class="col-xl-9 col-lg-9 col-md-10 col-sm-12">
                       
                            <div style="width:570px" class="swiper mySwiper quickSwiper">
                                <div class="swiper-wrapper quick-swiper">
                                    <!-- Slides will be dynamically added here -->
                                </div>
                                <div style="background: white; color:black; margin-right:8px
                                " class="swiper-button-next"><i
                                class="fa fa-angle-right"></i></div>
                        <div style="background: white; color:black;" class="swiper-button-prev"><i
                                class="fa fa-angle-left"></i></div>
                                <div class="swiper-pagination"></div>
                            </div>
                       
                    
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div style="margin-top:12px" class="col-xl-9 col-lg-9 col-md-10 col-sm-12">
                       
                           
                       
                        <div id="quick_data" style="width: 100%;">
                            
                        </div>
                    </div>
                </div>
                <!-- quick view data show -->
            </div>
            <div style="height:60px" class="modal-footer" id="quick_footer">
                <!-- Footer content will be appended here -->
            </div>
        </div>
    </div>
</div>
