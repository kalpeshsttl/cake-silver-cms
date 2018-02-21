<footer class="container-fluid bg-light">
    <div class="row">
        <div class="col-md-9 col-lg-10 ml-sm-auto p-0 py-1 px-4">
            <!-- footor top -->
            <?=$this->fetch('footer-top')?>
            <!-- /footor top -->
            <!-- footor -->
            <div class="row">
                <div class="container-fluid">
                    © <?= date('Y'); ?> <a href="https://www.silvertouch.com/" target="_blank">Silver Touch Technologies Ltd</a>
                </div>
            </div>
            <!-- /footor -->
            <!-- footor bottom -->
            <?=$this->fetch('footer-bottom')?>
            <!-- /footor bottom -->
        </div>
    </div>
</footer>