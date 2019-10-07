<div class="form-group">
    <label>Название</label>
    <input type="text" class="form-control" name="name" value="{{isset($category) ? $category->name : ''}}">
</div>
<div class="form-group">
    <label>Включена?</label>
    <select name="enabled" class="form-control">
        <option value="0">Отключена</option>
        <option value="1" @if(isset($category) && $category->enabled) selected @endif>Включена</option>
    </select>
</div>
<input type="hidden" name="slug">
<button type="submit" class="btn btn-success">{{$save}}</button>