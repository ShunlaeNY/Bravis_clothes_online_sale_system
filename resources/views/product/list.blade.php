@extends('layouts.adminlayout')
@section('title')
    Product List
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/pages/product/product.css')}}">
@endsection
@section('main')
        <div class="main">
            <div class="session1 flex_row">
                <h3>Products</h3>
                <a href="{{route('ProductCreate')}}">+ Add Product</a>
            </div>
            <div class="session2">
                <div class="grid">
                    <input type="text" placeholder="Search">
                    <select name="" id="">
                        <option value="">Category</option>
                    </select>
                    <input type="text" placeholder="Price">
                    <div class="buttons flex_row">
                        <button class="filter_button">Filter</button>
                        <button class="reset_button">Reset</button>
                    </div>
                </div>
            </div>
            <div class="session3">
                <div style="overflow-x: auto;">
                    <table>
                        <tr>
                            <th class="first_title">Product</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th class="last_title">Action</th>
                        </tr>
                        <tr>
                            <td>
                                <div class="item_flex_row flex_row">
                                    <div class="product_img"></div>
                                    <div>Polo Brown</div>
                                </div>
                            </td>
                            <td>Men Shirt</td>
                            <td>53,900MMK</td>
                            <td>
                                <div class="sizes flex_row">
                                    <div class="box_green">S - 5/30</div>
                                    <div class="box_green">M - 15/30</div>
                                    <div class="box_green">L - 25/30</div>
                                </div>
                            </td>
                            <td>
                                <a href="/pages/product/edit_product.html"><i class="fa-solid fa-pen-to-square"></i></a>
                                <i class="fa-regular fa-trash-can"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="item_flex_row flex_row">
                                    <div class="product_img"></div>
                                    <div>Polo Brown</div>
                                </div>
                            </td>
                            <td>Men Shirt</td>
                            <td>53,900MMK</td>
                            <td>
                                <div class="sizes flex_row">
                                    <div class="box_green">S - 5/30</div>
                                    <div class="box_green">M - 15/30</div>
                                    <div class="box_green">L - 25/30</div>
                                </div>
                            </td>
                            <td>
                                <a href="/pages/product/edit_product.html"><i class="fa-solid fa-pen-to-square"></i></a>
                                <i class="fa-regular fa-trash-can"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="item_flex_row flex_row">
                                    <div class="product_img"></div>
                                    <div>Polo Brown</div>
                                </div>
                            </td>
                            <td>Men Shirt</td>
                            <td>53,900MMK</td>
                            <td>
                                <div class="sizes flex_row">
                                    <div class="box_green">S - 5/30</div>
                                    <div class="box_green">M - 15/30</div>
                                    <div class="box_green">L - 25/30</div>
                                </div>
                            </td>
                            <td>
                                <a href="/pages/product/edit_product.html"><i class="fa-solid fa-pen-to-square"></i></a>
                                <i class="fa-regular fa-trash-can"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="item_flex_row flex_row">
                                    <div class="product_img"></div>
                                    <div>Polo Brown</div>
                                </div>
                            </td>
                            <td>Men Shirt</td>
                            <td>53,900MMK</td>
                            <td>
                                <div class="sizes flex_row">
                                    <div class="box_green">S - 5/30</div>
                                    <div class="box_green">M - 15/30</div>
                                    <div class="box_green">L - 25/30</div>
                                </div>
                            </td>
                            <td>
                                <a href="/pages/product/edit_product.html"><i class="fa-solid fa-pen-to-square"></i></a>
                                <i class="fa-regular fa-trash-can"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="item_flex_row flex_row">
                                    <div class="product_img"></div>
                                    <div>Polo Brown</div>
                                </div>
                            </td>
                            <td>Men Shirt</td>
                            <td>53,900MMK</td>
                            <td>
                                <div class="sizes flex_row">
                                    <div class="box_green">S - 5/30</div>
                                    <div class="box_green">M - 15/30</div>
                                    <div class="box_green">L - 25/30</div>
                                </div>
                            </td>
                            <td>
                                <a href="/pages/product/edit_product.html"><i class="fa-solid fa-pen-to-square"></i></a>
                                <i class="fa-regular fa-trash-can"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="item_flex_row flex_row">
                                    <div class="product_img"></div>
                                    <div>Polo Brown</div>
                                </div>
                            </td>
                            <td>Men Shirt</td>
                            <td>53,900MMK</td>
                            <td>
                                <div class="sizes flex_row">
                                    <div class="box_green">S - 5/30</div>
                                    <div class="box_green">M - 15/30</div>
                                    <div class="box_green">L - 25/30</div>
                                </div>
                            </td>
                            <td>
                                <a href="/pages/product/edit_product.html"><i class="fa-solid fa-pen-to-square"></i></a>
                                <i class="fa-regular fa-trash-can"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="item_flex_row flex_row">
                                    <div class="product_img"></div>
                                    <div>Polo Brown</div>
                                </div>
                            </td>
                            <td>Men Shirt</td>
                            <td>53,900MMK</td>
                            <td>
                                <div class="sizes flex_row">
                                    <div class="box_green">S - 5/30</div>
                                    <div class="box_green">M - 15/30</div>
                                    <div class="box_green">L - 25/30</div>
                                </div>
                            </td>
                            <td>
                                <a href="/pages/product/edit_product.html"><i class="fa-solid fa-pen-to-square"></i></a>
                                <i class="fa-regular fa-trash-can"></i>
                            </td>
                        </tr>
    
                        
                        <!-- last -->
                        <tr>
                            <td colspan="2" class="last_row_left">
                                <div class="page_info">
                                    Showing 1-7 of 50
                                </div>
                            </td>
                            <td colspan="3" class="last_row_right">
                                <div class="pagination">
                                    <a href="#">&laquo;</a>
                                    <a class="active" href="#">1</a>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <a href="#">4</a>
                                    <a href="#">5</a>
                                    <a href="#">6</a>
                                    <a href="#">7</a>
                                    <a href="#">&raquo;</a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>

        <!-- script -->
        <script src="/js/user_profile_info_popup.js"></script>
@endsection