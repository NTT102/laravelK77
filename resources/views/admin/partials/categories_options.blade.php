@forelse ($categories as $categoryValue)
    <option value="{{ $categoryValue->id }}" {{ isset($category) && $categoryValue->id===$category->parent_id?'selected':'' }}>
        @for ($i = 0; $i < $level; $i++)
            --|    
        @endfor
        {{ $categoryValue->name }}
    </option>
    @includewhen($categoryValue->sub->count(),'admin.partials.categories_options', ['categories' => $categoryValue->sub, 'level' => $level + 1])
@empty

@endforelse