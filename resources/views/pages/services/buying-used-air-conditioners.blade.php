@extends('layouts.app')

@php
    $seo = [
        'title' => 'شراء مكيفات مستعملة بجدة والرياض | أفضل الأسعار - سبليت وشباك',
        'description' =>
            'نشتري المكيفات المستعملة بأعلى الأسعار في جدة، مكة، والرياض. شراء مكيفات سبليت، شباك، ومكيفات مركزية شغالة أو خربانة. خدمة فك ونقل فوري والدفع كاش.',
        'keywords' =>
            'شراء مكيفات مستعملة, شراء مكيفات سبليت مستعملة, شراء مكيفات شباك, شراء مكيفات بجدة, شراء مكيفات مستعملة بالرياض, بيع مكيفات مستعملة',
    ];
@endphp

@push('schema')
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "شراء مكيفات مستعملة",
  "image": "{{ asset('assets/img/Used-air-conditioners_27_11zon.webp') }}",
  "description": "خدمة شراء جميع أنواع المكيفات المستعملة (سبليت، شباك، دولابي، مركزي) بأسعار تنافسية مع الفك والنقل في جدة والرياض.",
  "provider": {
    "@type": "LocalBusiness",
    "name": "{{ config('app.name', 'مؤسسة شراء اثاث') }}",
    "telephone": "0500000000",
    "priceRange": "$$",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Jeddah",
      "addressCountry": "SA"
    }
  },
  "areaServed": [
    {
      "@type": "City",
      "name": "Jeddah"
    },
    {
      "@type": "City",
      "name": "Riyadh"
    },
    {
      "@type": "City",
      "name": "Makkah"
    }
  ],
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "أنواع المكيفات المطلوبة",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "شراء مكيفات سبليت"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "شراء مكيفات شباك"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "شراء مكيفات مركزية"
        }
      }
    ]
  }
}
</script>
@endpush

@section('content')
    {{-- Hero Section --}}
    <section class="hero-section" style="background-color: #f8f9fa; padding: 4rem 0; overflow: hidden;">
        <div class="container">
            <div class="row align-items-center" style="display: flex; flex-wrap: wrap; align-items: center;">
                <div class="col-lg-6" style="flex: 1; padding: 1rem; min-width: 300px;">
                    <h1
                        style="font-size: 2.5rem; font-weight: 800; color: #1a1a1a; margin-bottom: 1.5rem; line-height: 1.3;">
                        شراء مكيفات مستعملة بجدة والرياض بأفضل الأسعار
                    </h1>
                    <p style="font-size: 1.25rem; color: #4a4a4a; margin-bottom: 2rem; line-height: 1.8;">
                        هل تبحث عن شركة موثوقة لبيع مكيفاتك القديمة؟ نحن متخصصون في <strong style="color: #0b6e4f;">شراء
                            المكيفات المستعملة</strong> بأنواعها (سبليت، شباك، مركزي) سواء كانت تعمل أو تحتاج لصيانة. نضمن
                        لك سعراً عادلاً وخدمة فك ونقل فورية ومجانية.
                    </p>
                    <div class="cta-buttons" style="display: flex; gap: 1rem; flex-wrap: wrap;">
                        <a href="tel:0500000000" class="btn btn-primary"
                            style="background-color: #0b6e4f; border: 2px solid #0b6e4f; color: white; padding: 0.8rem 2.5rem; text-decoration: none; border-radius: 8px; font-weight: 700; transition: all 0.3s ease;">
                            <i class="fas fa-phone-alt ms-2"></i> اتصل نصلك فوراً
                        </a>
                        <a href="https://wa.me/966500000000" class="btn btn-outline"
                            style="background-color: transparent; border: 2px solid #25D366; color: #25D366; padding: 0.8rem 2.5rem; text-decoration: none; border-radius: 8px; font-weight: 700; transition: all 0.3s ease;">
                            <i class="fab fa-whatsapp ms-2"></i> واتساب
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center" style="flex: 1; padding: 1rem; min-width: 300px;">
                    <img src="{{ asset('assets/img/Used-air-conditioners_27_11zon.webp') }}"
                        alt="شركة شراء مكيفات مستعملة في جدة والرياض - مكيفات سبليت وشباك" width="600" height="400"
                        style="max-width: 100%; height: auto; border-radius: 16px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); object-fit: cover;">
                </div>
            </div>
        </div>
    </section>

    {{-- Services Grid Section --}}
    <section class="services-section" style="padding: 5rem 0; background: #fff;">
        <div class="container">
            <div class="section-header text-center mb-5" style="margin-bottom: 4rem;">
                <h2 style="font-size: 2.25rem; font-weight: 800; color: #1a1a1a; margin-bottom: 1rem;">نشتري جميع أنواع
                    المكيفات</h2>
                <p style="color: #666; font-size: 1.1rem; max-width: 700px; margin: 0 auto;">
                    لا تقلق بشأن حالة المكيف أو نوعه، نحن مهتمون بشراء كافة الموديلات والأحجام بأسعار ترضيك.
                </p>
            </div>

            <div class="row"
                style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2.5rem;">
                {{-- Service Card 1: Split --}}
                <div class="service-card"
                    style="background: #fff; border: 1px solid #eee; border-radius: 12px; padding: 2rem; text-align: center; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="img-wrapper mb-4"
                        style="height: 200px; margin-bottom: 1.5rem; overflow: hidden; border-radius: 8px;">
                        <img src="{{ asset('assets/img/Buy-central-air-conditioner_9_11zon.webp') }}"
                            alt="شراء مكيفات سبليت مستعملة - مكيفات وحدة منفصلة" loading="lazy" width="400"
                            height="300" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <h3 style="font-size: 1.5rem; font-weight: 700; color: #333; margin-bottom: 1rem;">شراء مكيفات سبليت
                        مستعملة</h3>
                    <p style="color: #666; line-height: 1.6; margin-bottom: 1.5rem;">
                        نشتري مكيفات الاسبليت من كافة الماركات (LG، سامسونج، جنرال، جري) بأسعار مميزة، مع فك احترافي يحافظ
                        على سلامة منزلك.
                    </p>
                </div>

                {{-- Service Card 2: Window --}}
                <div class="service-card"
                    style="background: #fff; border: 1px solid #eee; border-radius: 12px; padding: 2rem; text-align: center; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="img-wrapper mb-4"
                        style="height: 200px; margin-bottom: 1.5rem; overflow: hidden; border-radius: 8px;">
                        <img src="{{ asset('assets/img/Buy-a-wall-air-conditioner_7_11zon.webp') }}"
                            alt="شراء مكيفات شباك قديمة ومستعملة" loading="lazy" width="400" height="300"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <h3 style="font-size: 1.5rem; font-weight: 700; color: #333; margin-bottom: 1rem;">شراء مكيفات شباك</h3>
                    <p style="color: #666; line-height: 1.6; margin-bottom: 1.5rem;">
                        متخصصون في شراء مكيفات الشباك (Window AC) بجميع المقاسات 18 و 24 وحدة، حتى القديمة جداً أو التي
                        تحتاج صيانة.
                    </p>
                </div>

                {{-- Service Card 3: Central/Commercial --}}
                <div class="service-card"
                    style="background: #fff; border: 1px solid #eee; border-radius: 12px; padding: 2rem; text-align: center; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="img-wrapper mb-4"
                        style="height: 200px; margin-bottom: 1.5rem; overflow: hidden; border-radius: 8px;">
                        {{-- Reusing relevant image or general AC image if specific central image missing --}}
                        <img src="{{ asset('assets/img/Used-air-conditioners_27_11zon.webp') }}"
                            alt="شراء مكيفات مركزية ودولابي للمحلات والشركات" loading="lazy" width="400" height="300"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <h3 style="font-size: 1.5rem; font-weight: 700; color: #333; margin-bottom: 1rem;">شراء مكيفات مركزية
                        وتجارية</h3>
                    <p style="color: #666; line-height: 1.6; margin-bottom: 1.5rem;">
                        نشتري المكيفات المركزية، البكج، والدولابي (Stand) من المكاتب والشركات والمساجد والفلل عند التجديد أو
                        التصفية.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Location & Features Section --}}
    <section class="features-section" style="padding: 5rem 0; background-color: #f0f4f8;">
        <div class="container">
            <div class="row align-items-center" style="display: flex; flex-wrap: wrap;">
                <div class="col-lg-6" style="flex: 1; padding: 2rem; min-width: 300px;">
                    <h2 style="font-size: 2.25rem; font-weight: 800; color: #1a1a1a; margin-bottom: 1.5rem;">
                        لماذا نحن الخيار الأفضل لبيع مكيفاتك؟
                    </h2>
                    <ul class="features-list" style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 1.5rem; display: flex; align-items: flex-start;">
                            <span style="color: #0b6e4f; font-size: 1.5rem; margin-left: 1rem;">✓</span>
                            <div>
                                <h4 style="font-weight: 700; margin-bottom: 0.5rem;">تغطية شاملة (جدة - الرياض - مكة)</h4>
                                <p style="color: #555;">سواء كنت تبحث عن <strong style="color: #333;">شراء مكيفات
                                        بجدة</strong> أو <strong style="color: #333;">شراء مكيفات مستعملة بالرياض</strong>،
                                    فرقنا جاهزة لخدمتك أينما كنت.</p>
                            </div>
                        </li>
                        <li style="margin-bottom: 1.5rem; display: flex; align-items: flex-start;">
                            <span style="color: #0b6e4f; font-size: 1.5rem; margin-left: 1rem;">✓</span>
                            <div>
                                <h4 style="font-weight: 700; margin-bottom: 0.5rem;">أعلى سعر بالسوق</h4>
                                <p style="color: #555;">لا نبخس الأسعار! نقيم المكيفات بأمانة بناءً على حالتها ونظافتها
                                    لنعطيك العرض المستحق.</p>
                            </div>
                        </li>
                        <li style="margin-bottom: 1.5rem; display: flex; align-items: flex-start;">
                            <span style="color: #0b6e4f; font-size: 1.5rem; margin-left: 1rem;">✓</span>
                            <div>
                                <h4 style="font-weight: 700; margin-bottom: 0.5rem;">خدمة سريعة ومريحة</h4>
                                <p style="color: #555;">مجرد اتصال واحد، ويصلك مندوبنا للمعاينة والاتفاق والدفع والتحميل في
                                    نفس الزيارة.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6" style="flex: 1; padding: 2rem; min-width: 300px; text-align: center;">
                    <div
                        style="background: white; padding: 3rem; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                        <h3 style="color: #0b6e4f; margin-bottom: 1.5rem;">احصل على عرض سعر الآن</h3>
                        <p style="color: #666; margin-bottom: 2rem;">أرسل صور المكيفات عبر الواتساب وسيتم الرد عليك فوراً
                            بالتقدير الأولي للسعر.</p>
                        <a href="https://wa.me/966500000000" class="btn btn-success"
                            style="background-color: #25D366; color: white; border: none; padding: 1rem 3rem; border-radius: 50px; font-weight: bold; font-size: 1.1rem; text-decoration: none; display: inline-block;">
                            <i class="fab fa-whatsapp ms-2"></i> إرسال الصور
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section class="faq-section" style="padding: 5rem 0; background: #fff;">
        <div class="container">
            <h2 class="text-center mb-5" style="font-size: 2rem; font-weight: 800; color: #1a1a1a;">الأسئلة الشائعة</h2>
            <div style="max-width: 800px; margin: 0 auto;">
                <x-faq :faqs="[
                    [
                        'q' => 'هل تقومون بشراء المكيفات الخربانة؟',
                        'a' =>
                            'نعم، نشتري المكيفات العطلانة أو القديمة جداً (سكراب) للاستفادة منها كقطع غيار أو إعادة تدوير.',
                    ],
                    [
                        'q' => 'كم سعر المكيف المستعمل؟',
                        'a' =>
                            'يعتمد السعر على النوع (سبليت/شباك)، الماركة، الحالة العامة، والعمر الافتراضي. أرسل الصور لنعطيك سعراً دقيقاً.',
                    ],
                    [
                        'q' => 'هل توفرون خدمة شراء مكيفات مستعملة بالرياض؟',
                        'a' => 'نعم، لدينا مندوبين وفرق عمل تغطي مدينة الرياض لشراء الكميات والمكيفات المنزلية.',
                    ],
                    [
                        'q' => 'هل النقل والفك عليكم؟',
                        'a' =>
                            'بالتأكيد. نرسل فنيين متخصصين لفك المكيفات بحرص ونقلها بسياراتنا الخاصة دون أي تكلفة إضافية عليك.',
                    ],
                ]" />
            </div>
        </div>
    </section>

    {{-- Final CTA --}}
    <section class="cta-section text-center"
        style="padding: 4rem 0; background: linear-gradient(135deg, #0b6e4f 0%, #084c36 100%); color: white;">
        <div class="container">
            <h2 style="font-weight: 800; margin-bottom: 1.5rem;">هل أنت جاهز لبيع مكيفاتك؟</h2>
            <p style="font-size: 1.2rem; margin-bottom: 2.5rem; opacity: 0.9;">اتصل بنا الآن نصلك أينما كنت في جدة، مكة، أو
                الرياض.</p>
            <div class="cta-group" style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="tel:0500000000" class="btn btn-light"
                    style="background: white; color: #0b6e4f; padding: 1rem 3rem; border-radius: 50px; font-weight: 800; text-decoration: none;">
                    0500000000 <i class="fas fa-phone ms-2"></i>
                </a>
            </div>
        </div>
    </section>
@endsection
