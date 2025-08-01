<h1 class="mt-0 mb-4 font-bold">Home Dashboard</h1>

<div class="row">
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-success float-right">Monthly</span>
                </div>
                <h5>Item</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"><?= count($items) ?></h1>
                <small>Total Item</small>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-info float-right">Annual</span>
                </div>
                <h5>Orders</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">275,800</h1>
                <small>New orders</small>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-primary float-right">Annual</span>
                </div>
                <h5>Customer</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"><?= count($customers) ?></h1>
                <small>Total Customer</small>
            </div>
        </div>
    </div>
</div>