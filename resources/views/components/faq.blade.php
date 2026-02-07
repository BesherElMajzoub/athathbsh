@props(['faqs'])

<div class="faq-accordion">
    @foreach ($faqs as $index => $faq)
        <div class="faq-item">
            <button class="faq-question" aria-expanded="false" aria-controls="faq-{{ $index }}">
                <span>{{ $faq['q'] }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>
            <div class="faq-answer" id="faq-{{ $index }}" hidden>
                <p>{{ $faq['a'] }}</p>
            </div>
        </div>
    @endforeach
</div>
