@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>商品の出品</h1>
    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="productImage">商品画像</label>
            <input type="file" name="productImage" id="productImage" class="form-control">
        </div>

        <div class="form-group">
            <label for="productDetails">商品の詳細</label>
        </div>

        <div class="form-group">
            <label>カテゴリー</label>
            <div class="categories">
                <button type="button">カテゴリー1</button>
                <button type="button">カテゴリー2</button>
                <button type="button">カテゴリー3</button>
                <button type="button">カテゴリー4</button>
                <button type="button">カテゴリー5</button>
            </div>
        </div>

        <div class="form-group">
            <label for="condition">商品の状態</label>
            <select name="condition" id="condition" class="form-control">
                <option value="">選んでください</option>
                <option value="1">良好</option>
                <option value="2">目立った傷や汚れなし</option>
                <option value="3">やや傷や汚れあり</option>
                <option value="4">状態が悪い</option>
            </select>
        </div>

        <div class="form-group">
            <label for="productName">商品名</label>
            <input type="text" name="productName" id="productName" class="form-control">
        </div>

        <div class="form-group">
            <label for="productDescription">商品名と説明</label>
            <textarea name="productDescription" id="productDescription" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="price">販売価格</label>
            <input type="number" name="price" id="price" class="form-control">
        </div>

        <div class="form-group">
            <label for="shippingCost">配送料</label>
            <input type="number" name="shippingCost" id="shippingCost" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">出品する</button>
    </form>
</div>
@endsection
