@props(['category'])
<div class="grid grid-cols-4 p-4">
    <div>
        <p class="mb-3 text-lg font-bold text-center text-neutral-500">Subcategorías</p>
        <ul>
            @foreach ($category->subcategories as $subcategory)
                <li>
                    <a class="inline-block px-4 py-1 font-semibold text-neutral-500 hover:text-orange-500"
                        href="">{{ $subcategory->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-span-3">
        
    </div>
</div>
