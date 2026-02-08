@extends('layouts.app')

@php
    $seo = [
        'title' => 'الصفحة غير موجودة - 404',
        'description' =>
            'عذراً، الصفحة التي تبحث عنها غير موجودة. يمكنكم العودة للصفحة الرئيسية أو تصفح خدماتنا في شراء الأثاث والمكيفات المستعملة.',
        'keywords' => '404, صفحة غير موجودة, خطأ',
    ];
@endphp

@section('content')
    <section class="error-page"
        style="min-height: 70vh; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: 4rem 1rem; background-color: #fcfcfc;">
        <div class="container">
            <div class="error-content" style="max-width: 600px; margin: 0 auto;">

                <div class="logo-wrapper" style="margin-bottom: 2rem;">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="شعار مؤسسة شراء أثاث مستعمل - جدة والرياض"
                        width="150" height="auto" style="max-width: 150px; height: auto;">
                </div>

                <h1 class="text-primary"
                    style="font-size: 6rem; font-weight: 800; color: #0b6e4f; line-height: 1; margin-bottom: 1rem;">404</h1>

                <h2 class="h3" style="font-size: 2rem; font-weight: 700; color: #333; margin-bottom: 1.5rem;">عذراً،
                    الصفحة غير موجودة</h2>

                <p class="lead" style="font-size: 1.1rem; color: #666; margin-bottom: 2.5rem; line-height: 1.6;">
                    يبدو أن الرابط الذي حاولت الوصول إليه غير صحيح أو تم نقل الصفحة.
                    لا تقلق، يمكنك العودة للصفحة الرئيسية أو الانتقال مباشرة لخدماتنا المميزة.
                </p>

                <div class="buttons"
                    style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-bottom: 3rem;">
                    <a href="{{ route('home') }}" class="btn btn-primary"
                        style="background-color: #0b6e4f; border-color: #0b6e4f; color: white; padding: 0.8rem 2rem; border-radius: 8px; font-weight: 700; text-decoration: none;">
                        العودة للرئيسية
                    </a>
                    <a href="{{ route('services.index') }}" class="btn btn-outline-primary"
                        style="border: 2px solid #0b6e4f; color: #0b6e4f; padding: 0.8rem 2rem; border-radius: 8px; font-weight: 700; text-decoration: none; background: transparent;">
                        تصفح الخدمات
                    </a>
                </div>

                <div class="popular-services" style="padding-top: 2rem; border-top: 1px solid #eee;">
                    <h3 class="h6" style="margin-bottom: 1rem; color: #888; font-weight: 600;">
                        خدمات قد تهمك:
                    </h3>

                    <div class="chips" style="display: flex; gap: 0.8rem; justify-content: center; flex-wrap: wrap;">
                        <a href="{{ Route::has('services.show')
                            ? route('services.show', 'buying-used-air-conditioners')
                            : url('/services/buying-used-air-conditioners') }}"
                            class="chip"
                            style="background: #f0f4f8; color: #333; padding: 0.5rem 1rem; border-radius: 50px; text-decoration: none; font-size: 0.9rem; transition: background 0.3s;">
                            شراء مكيفات مستعملة
                        </a>

                        <a href="{{ Route::has('services.show')
                            ? route('services.show', 'buying-used-furniture')
                            : url('/services/buying-used-furniture') }}"
                            class="chip"
                            style="background: #f0f4f8; color: #333; padding: 0.5rem 1rem; border-radius: 50px; text-decoration: none; font-size: 0.9rem; transition: background 0.3s;">
                            شراء أثاث مستعمل
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
