<div class="form-group">
    <label>Название</label>
    <input type="text" class="form-control" name="name" value="{{isset($product) ? $product->name : ''}}">
</div>
<div class="form-group">
    <label>Категория</label>
    <select name="category_id" class="form-control">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Количество на складе</label>
    <input type="number" class="form-control" name="amount" min="0" value="{{isset($product) ? $product->amount : 0}}">
    <small>в граммах</small>
</div>
<div class="form-group">
    <label>Включен?</label>
    <select name="enabled" class="form-control">
        <option value="0">Отключен</option>
        <option value="1" @if(isset($product) && $product->enabled) selected @endif>Включен</option>
    </select>
</div>
<div class="form-group">
    <label>Цена</label>
    <input type="number" class="form-control" name="price" min="0" value="{{isset($product) ? $product->price : 0}}">
</div>
<div class="form-group">
    <label>Вес в одном стеке</label>
    <input type="number" class="form-control" name="weight" min="0" value="{{isset($product) ? $product->weight : 0}}">
    <small>в граммах</small>
</div>
<div class="form-group">
    <label>Картинка @if(isset($product)) (необязательно) @endif</label>
    <input type="file" class="form-control" name="picture">
</div>
<button type="submit" class="btn btn-success">{{$save}}</button>