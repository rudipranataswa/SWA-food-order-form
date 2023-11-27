<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form>
                <!-- Title -->
                <div class="row form-group">
                    <div class="col-lg-6">
                        <h3 class="title-5 m-b-35">New PO Meal</h3>
                        <div class="card">
                            <form action="" method="post" class="form-horizontal">
                                <div class="card-header">                                       
                                    <strong>PO Meal Detail</strong>
                                </div>
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-sm-5">
                                            <label for="title" class=" form-control-label">Title <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col col-sm-6">
                                            <input type="text" id="title" name="title" placeholder="Type here..." class="form-control">
                                            <small class="form-text text-danger"><?= form_error('title'); ?></small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-sm-5">
                                            <label for="begin-date" class=" form-control-label">Begin Date <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col col-sm-6">
                                            <input type="date" id="begin-date" name="begin-date" placeholder="Type here..." class="form-control">
                                            <small class="form-text text-danger"><?= form_error('begin_date'); ?></small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-sm-5">
                                            <label for="end-date" class=" form-control-label">End Date <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col col-sm-6">
                                            <input type="date" id="end-date" name="end-date" placeholder="Type here..." class="form-control">
                                            <small class="form-text text-danger"><?= form_error('end_date'); ?></small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-sm-5">
                                            <label for="input-normal" class=" form-control-label">Status <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col col-sm-6">
                                            <?php foreach ($category_item as $cat) : ?>
                                            <select
                                                name="select"
                                                id="input-normal"
                                                class="form-control"
                                            >
                                            <option value="0">Please select</option>
                                            <option value="1">Option #1</option>
                                            <option value="2">Option #2</option>
                                            <option value="3">Option #3</option>
                                            </select>
                                            <?php endforeach; ?>
                                        </div>
                                    </div> 
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class=""></i> Submit
                                    </button>
                                    <!-- <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Reset
                                    </button> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Table -->
                <div class="row form-group">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        <div class="table-responsive">
                            <table class="table table-data2">
                            <thead>
                                <tr>
                                <th rowspan="2" class="align-middle">Week 1</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thrusday</th>
                                <th>Friday</th>
                                </tr>
                                <tr>
                                <th>6/11/2023</th>
                                <th>7/11/2023</th>
                                <th>8/11/2023</th>
                                <th>9/11/2023</th>
                                <th>10/11/2023</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr">
                                    <td rowspan="2" class="align-middle">Daily Set</td>
                                    <td class="desc">
                                        <select
                                            name="select"
                                            id="input-normal"
                                            class="form-control"
                                        >
                                        <option value="0">Select Menu..</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        </select>
                                    </td>
                                    <td class="desc">
                                        <select
                                            name="select"
                                            id="input-normal"
                                            class="form-control"
                                        >
                                        <option value="0">Select Menu..</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        </select>
                                    </td>
                                    <td class="desc">
                                        <select
                                            name="select"
                                            id="input-normal"
                                            class="form-control"
                                        >
                                        <option value="0">Select Menu..</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        </select>
                                    </td>
                                    <td class="desc">
                                        <select
                                            name="select"
                                            id="input-normal"
                                            class="form-control"
                                        >
                                        <option value="0">Select Menu..</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        </select>
                                    </td>
                                    <td class="desc">
                                        <select
                                            name="select"
                                            id="input-normal"
                                            class="form-control"
                                        >
                                        <option value="0">Select Menu..</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="tr">
                                <td>
                                    <input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
                                </td>
                                <td>
                                    <input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
                                </td>  
                                <td>
                                    <input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
                                </td>  
                                <td>
                                    <input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
                                </td>
                                <td>
                                    <input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
                                </td>    
                                </tr>
                                <tr class="spacer"></tr>
                                <tr class="tr">
                                    <td rowspan="2" class="align-middle">Pasta</td>
                                    <td class="desc">
                                        <select
                                            name="select"
                                            id="input-normal"
                                            class="form-control"
                                        >
                                        <option value="0">Select Menu..</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        </select>
                                    </td>
                                    <td class="desc">
                                        <select
                                            name="select"
                                            id="input-normal"
                                            class="form-control"
                                        >
                                        <option value="0">Select Menu..</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        </select>
                                    </td>
                                    <td class="desc">
                                        <select
                                            name="select"
                                            id="input-normal"
                                            class="form-control"
                                        >
                                        <option value="0">Select Menu..</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        </select>
                                    </td>
                                    <td class="desc">
                                        <select
                                            name="select"
                                            id="input-normal"
                                            class="form-control"
                                        >
                                        <option value="0">Select Menu..</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        </select>
                                    </td>
                                    <td class="desc">
                                        <select
                                            name="select"
                                            id="input-normal"
                                            class="form-control"
                                        >
                                        <option value="0">Select Menu..</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        </select>
                                    </td>
                                    
                                </tr>
                                <tr class="tr">
                                <td>
                                    <input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
                                </td>
                                <td>
                                    <input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
                                </td>  
                                <td>
                                    <input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
                                </td>  
                                <td>
                                    <input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
                                </td>
                                <td>
                                    <input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
                                </td>    
                                </tr>
                                <tr class="spacer"></tr>
                                <tr class="tr">
                                    <td rowspan="2" class="align-middle">Stall</td>
                                    <td class="desc">
                                        <select
                                            name="select"
                                            id="input-normal"
                                            class="form-control"
                                        >
                                        <option value="0">Select Menu..</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        </select>
                                    </td>
                                    <td class="desc">
                                        <select
                                            name="select"
                                            id="input-normal"
                                            class="form-control"
                                        >
                                        <option value="0">Select Menu..</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        </select>
                                    </td>
                                    <td class="desc">
                                        <select
                                            name="select"
                                            id="input-normal"
                                            class="form-control"
                                        >
                                        <option value="0">Select Menu..</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        </select>
                                    </td>
                                    <td class="desc">
                                        <select
                                            name="select"
                                            id="input-normal"
                                            class="form-control"
                                        >
                                        <option value="0">Select Menu..</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        </select>
                                    </td>
                                    <td class="desc">
                                        <select
                                            name="select"
                                            id="input-normal"
                                            class="form-control"
                                        >
                                        <option value="0">Select Menu..</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        </select>
                                    </td>
                                    
                                </tr>
                                <tr class="tr">
                                <td>
                                    <input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
                                </td>
                                <td>
                                    <input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
                                </td>  
                                <td>
                                    <input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
                                </td>  
                                <td>
                                    <input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
                                </td>
                                <td>
                                    <input type="number" id="input-normal" name="input-normal" placeholder="Price..." class="form-control">
                                </td>    
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <button class="btn btn-success btn-lg float-right"
                                type="submit">
                            Submit 
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Pop-up -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            Are you sure to submit?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>