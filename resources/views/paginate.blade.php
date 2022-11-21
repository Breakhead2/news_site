@if ($paginator->hasPages())
    <div>
        <nav>
            <ul class="pagination_box">
                <li class="page_item" wire:click="previousPage">Назад</li>

{{--                <ul class="pages">--}}
{{--                    <li class="page_item">1</li>--}}
{{--                    <li class="page_item">2</li>--}}
{{--                    <li class="page_item">3</li>--}}
{{--                </ul>--}}

                <li class="page_item">Вперед</li>
            </ul>
        </nav>
    </div>
@endif
