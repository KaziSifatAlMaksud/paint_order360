<?php
require  public_path().'/painter/header.php';
require  public_path().'/painter/sidebar.php';
?>
<div id="page-content-wrapper">
    <div class="header-hide">
        <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>
        <div class="container-fluid">
            <h2>Paint Order</h2>
        </div>
    </div>
    <div class="container-fluid last-order">
        <div class="row">
            <div class="col-lg-12">
                <div class="topbar">
                    <h2>Paint Order</h2>
                </div>
                <div class="bottombar mt-70">
                    <form class="col s12 upper-form no-more">
                        <div class="row">
                            <div class="input-field col col-lg-3 col-md-6 col-xs-12">
                                <input id="address" type="text" class="validate">
                                <label for="address">Job Address</label>
                            </div>
                            <div class="input-field col col-lg-3 col-md-6 col-xs-12">
                                <input id="cust_name" type="text" class="validate">
                                <label for="cust_name">Customer Name</label>
                            </div>
                            <div class="input-field col col-lg-3 col-md-6 col-xs-12">
                                <input id="order_number" type="tel" class="validate">
                                <label for="order_number">Order Number</label>
                            </div>
                            <div class="input-field col col-lg-3 col-md-6 col-xs-12">
                                <select class="select-amount">
                                    <option value="1" selected>Wisdom Homes A837647</option>
                                    <option value="2">ABCD Builing C63738</option>
                                    <option value="3">Best Builder H73569</option>
                                </select>
                                <label>Best Builder H735363</label>
                            </div>
                        </div>
                    </form>
                    <div class="">
                        <!--outside colour-->
                        <div id="outside" class="no-more-tables pull-left visible-lg">
                            <table class="col-md-12 table-bordered table table-condensed table-responsive cf">
                                <thead class="cf">
                                    <tr>
                                        <th>Outside Colours</th>
                                        <th>Product</th>
                                        <th>Sheen</th>
                                        <th>Size</th>
                                        <th>Amount</th>
                                        <th>Colour Name</th>
                                        <th>Tint</th>
                                        <th>Brand</th>
                                        <th>Notes</th>
                                        <th>For What Area</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-title="Outside Colours">Eaves</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td data-title="Outside Colours">Downpipes</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td data-title="Outside Colours">Meter box</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Front door</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Laundry door</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Balcony door</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Main Render </td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Render 2 </td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Render 3</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Main Cladding</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cladding 2</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cladding 3</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--Inside Colour-->
                        <div id="inside" class="no-more-tables mt-50 pull-left visible-lg">
                            <table class="col-md-12 table-bordered  table-condensed cf">
                                <thead class="cf">
                                    <tr>
                                        <th>inside colours</th>
                                        <th>Product</th>
                                        <th>Sheen</th>
                                        <th>Size</th>
                                        <th>Amount</th>
                                        <th>Colour Name</th>
                                        <th>Tint</th>
                                        <th>Brand</th>
                                        <th>Notes</th>
                                        <th>For What Area</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-title="inside colours">Ceilings</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Walls</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Wall undercoat</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Woodwork colour</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Woodwork undercoat</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Feature room 1</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Feature room 2</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1st Feature wall</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2nd Feature wall</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3rd Feature wall</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Stringer</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Handrail</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Post</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Post</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Post</td>
                                        <td data-title="Product">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Sheen">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">Mat</option>
                                                    <option value="2">Low Sheen</option>
                                                    <option value="3">Full Gloss</option>
                                                    <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Size">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">15 L</option>
                                                    <option value="2">10 L</option>
                                                    <option value="3">4 L</option>
                                                    <option value="4">2 L</option>
                                                    <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Up To 20</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Colour Name">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="Tint">
                                            <div class="select-style">
                                                <select>
                                                    <option value="0" selected disabled>Select</option>
                                                    <option value="1">150%</option>
                                                    <option value="2">125%</option>
                                                    <option value="3">100%</option>
                                                    <option value="4">75%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Brand">
                                            <div class="select-style">
                                                <select>
                                                    <option value="select" selected disabled>Select</option>
                                                    <option value="1">Taubmans</option>
                                                    <option value="2">Bristol</option>
                                                    <option value="3">Dulux</option>
                                                    <option value="4">Wattyl</option>
                                                    <option value="5">Pascal</option>
                                                    <option value="6">Solver</option>
                                                    <option value="7">Haymes</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" class="validate">
                                            </div>
                                        </td>
                                        <td data-title="For What Area">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--mobile view start-->
                        <div class="mobile-view hidden-lg">
                            <form id="inside-form">
                                <div id="outside" class="no-more-tables pull-left hidden-lg">
                                    <table class="col-md-12 table-bordered table-condensed cf">
                                        <tbody>
                                            <tr class="outside-color">
                                                <td colspan="2">
                                                    <div class="input-field col s12">
                                                        <input id="outside-color" type="text" class="validate"
                                                            placeholder="" value="Colour1">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="outside-color-heading">
                                                <td colspan="2">
                                                    <div class="input-field col s12">
                                                        <input id="color" type="text" class="validate"
                                                            placeholder="Colour Name ?">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-field col s12">
                                                        <input id="color-code" type="text" class="validate"
                                                            placeholder="Colour Code">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-field col s12">
                                                        <input id="product" type="text" class="validate"
                                                            placeholder="Product">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-field col s12">
                                                        <input id="notes" type="text" class="validate"
                                                            placeholder="Notes">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="select-style">
                                                        <select>
                                                            <option value="select" selected disabled>Brand</option>
                                                            <option value="1">Taubmans</option>
                                                            <option value="2">Bristol</option>
                                                            <option value="3">Dulux</option>
                                                            <option value="4">Wattyl</option>
                                                            <option value="5">Pascal</option>
                                                            <option value="6">Solver</option>
                                                            <option value="7">Haymes</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="select-style">
                                                        <select>
                                                            <option value="0" selected disabled>Sheen</option>
                                                            <option value="1">Mat</option>
                                                            <option value="2">Low Sheen</option>
                                                            <option value="3">Full Gloss</option>
                                                            <option value="4">Other</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="select-style">
                                                        <select>
                                                            <option value="0" selected disabled>Tint</option>
                                                            <option value="1">150%</option>
                                                            <option value="2">125%</option>
                                                            <option value="3">100%</option>
                                                            <option value="4">75%</option>
                                                            <option value="5">50%</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="select-style">
                                                        <select>
                                                            <option value="0" selected disabled>Size</option>
                                                            <option value="1">15 L</option>
                                                            <option value="2">10 L</option>
                                                            <option value="3">4 L</option>
                                                            <option value="4">2 L</option>
                                                            <option value="5">1 L</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td data-title="">
                                                    <div class="select-style">
                                                        <select>
                                                            <option value="0" selected disabled>Amount</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">Up To 20</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="inside" class="no-more-tables pull-left hidden-lg">
                                    <table class="col-md-12 table-bordered table-condensed cf">
                                        <tbody>
                                            <tr class="outside-color">
                                                <td colspan="2">
                                                    <div class="input-field col s12">
                                                        <input id="inside-color" type="text" class="validate"
                                                            placeholder="" value="Colour2">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="outside-color-heading">
                                                <td colspan="2">
                                                    <div class="input-field col s12">
                                                        <input id="color" type="text" class="validate"
                                                            placeholder="Colour Name ?">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-field col s12">
                                                        <input id="color-code" type="text" class="validate"
                                                            placeholder="Colour Code">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-field col s12">
                                                        <input id="product" type="text" class="validate"
                                                            placeholder="Product">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-field col s12">
                                                        <input id="notes" type="text" class="validate"
                                                            placeholder="Notes">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="select-style">
                                                        <select>
                                                            <option value="select" selected disabled>Brand</option>
                                                            <option value="1">Taubmans</option>
                                                            <option value="2">Bristol</option>
                                                            <option value="3">Dulux</option>
                                                            <option value="4">Wattyl</option>
                                                            <option value="5">Pascal</option>
                                                            <option value="6">Solver</option>
                                                            <option value="7">Haymes</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="select-style">
                                                        <select>
                                                            <option value="0" selected disabled>Sheen</option>
                                                            <option value="1">Mat</option>
                                                            <option value="2">Low Sheen</option>
                                                            <option value="3">Full Gloss</option>
                                                            <option value="4">Other</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="select-style">
                                                        <select>
                                                            <option value="0" selected disabled>Tint</option>
                                                            <option value="1">150%</option>
                                                            <option value="2">125%</option>
                                                            <option value="3">100%</option>
                                                            <option value="4">75%</option>
                                                            <option value="5">50%</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="select-style">
                                                        <select>
                                                            <option value="0" selected disabled>Size</option>
                                                            <option value="1">15 L</option>
                                                            <option value="2">10 L</option>
                                                            <option value="3">4 L</option>
                                                            <option value="4">2 L</option>
                                                            <option value="5">1 L</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td data-title="">
                                                    <div class="select-style">
                                                        <select>
                                                            <option value="0" selected disabled>Amount</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">Up To 20</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                            <div class="more-entry">
                                <div class="radio">
                                    <input class="with-gap" name="f1" type="radio" id="more-paint"
                                        value="new_housing.html" onclick="changeval()" />
                                    <label for="more-paint">More Paint<img src="image/sidemnu/Buy_Hover.png"></label>
                                </div>
                                <div class="radio">
                                    <input class="with-gap" name="f1" type="radio" id="f2" value="finish_order.html"
                                        onclick="openLink(this)" />
                                    <label for="f2">Finish Order<img src="image/sidemnu/Detail_Hover.png"></label>
                                </div>

                            </div>
                        </div>
                        <!--mobile view end-->


                        <div class="clearfix"></div>
                        <div class="mt-50 row mt-s-30 visible-lg">
                            <form action="#" class="col-sm-12 no-more">
                                <div class="pick-one pull-left w-100">
                                    <ul class="list-inline pull-left">
                                        <li>
                                            <p class="pull-left">
                                                <input class="with-gap" name="group1" type="radio" id="test1" />
                                                <label for="test1"><img src="image/icon/shop_center.png">Pick up paint
                                                    from shop</label>
                                            </p>
                                        </li>
                                        <li>
                                            <p class="pull-left">
                                                <input class="with-gap" name="group1" type="radio" id="test2" />
                                                <label for="test2"><img src="image/icon/home.png">Deliver to my
                                                    home</label>
                                            </p>
                                        </li>
                                        <li>
                                            <p class="pull-left">
                                                <input class="with-gap" name="group1" type="radio" id="test3" />
                                                <label for="test3"><img src="image/icon/ambulance_round.png">Deliver to
                                                    this job address</label>
                                            </p>
                                        </li>
                                    </ul>
                                    <button class="btn btn-orange medium ronded pull-right">Go</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
<?php
require  public_path().'/painter/footer.php';
?>