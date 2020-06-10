{{--
    <form action="">
        <ul>
            {{csrf_field()}}
            @foreach ($categories as $category)
                @if($category->category_id==0)
                    <li class="list2">{{$category->title}}
                @endif
                        @if($category->children()->count()>0)
                            <ul>
                                @foreach($category->children as $category)
                                    @include('admin.categories.child_category',$category)
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    @endforeach

                    <input type="submit" value="send"/>
        </ul>
    </form>



--}}

@extends('layouts.admin')
@section('content')
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">موضوعات <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <?php foreach($categories as $category): ?>
        <li<?= ($category->children->count() > 0 ? ' class="dropdown dropdown-submenu"' : '')?>>
            <?php if($category->children->count() > 0): ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                {{ $category->title }}
                <span class="fa fa-caret-left"></span>
            </a>
            <ul class="dropdown-menu">
                <?php foreach($category->children as $child): ?>
                <li>
                    <a href="">
                        {{ $child->title }}
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php else: ?>



            <?php endif; ?>
        </li>
        <?php endforeach; ?>
    </ul>
</li>
@endsection
