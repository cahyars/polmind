@if ($paginator->hasPages())
  <nav role="navigation" aria-label="Pagination Navigation" class="admin-pagination-nav">
    <div class="admin-pagination-info">
      <span>
        Menampilkan
        <strong>{{ $paginator->firstItem() }}</strong>
        sampai
        <strong>{{ $paginator->lastItem() }}</strong>
        dari
        <strong>{{ $paginator->total() }}</strong>
        hasil
      </span>
    </div>

    <ul class="admin-pagination-list">
      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
        <li class="admin-page-item disabled" aria-disabled="true" aria-label="Sebelumnya">
          <span class="admin-page-link">
            <i class="fas fa-chevron-left" style="font-size: 11px; margin-right: 4px;"></i> Sebelumnya
          </span>
        </li>
      @else
        <li class="admin-page-item">
          <a class="admin-page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Sebelumnya">
            <i class="fas fa-chevron-left" style="font-size: 11px; margin-right: 4px;"></i> Sebelumnya
          </a>
        </li>
      @endif

      {{-- Pagination Elements --}}
      @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
          <li class="admin-page-item disabled" aria-disabled="true"><span class="admin-page-link">{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li class="admin-page-item active" aria-current="page"><span class="admin-page-link">{{ $page }}</span></li>
            @else
              <li class="admin-page-item"><a class="admin-page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
          @endforeach
        @endif
      @endforeach

      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
        <li class="admin-page-item">
          <a class="admin-page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Berikutnya">
            Berikutnya <i class="fas fa-chevron-right" style="font-size: 11px; margin-left: 4px;"></i>
          </a>
        </li>
      @else
        <li class="admin-page-item disabled" aria-disabled="true" aria-label="Berikutnya">
          <span class="admin-page-link">
            Berikutnya <i class="fas fa-chevron-right" style="font-size: 11px; margin-left: 4px;"></i>
          </span>
        </li>
      @endif
    </ul>
  </nav>
@endif
