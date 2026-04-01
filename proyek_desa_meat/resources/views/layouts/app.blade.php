<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profil->nama_desa ?? 'Desa Wisata Meat' }} — Pesona Danau Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css">
    <style>
        :root {
            --forest: #1B5E2F;
            --forest-m: #2E7D4F;
            --forest-l: #4CAF73;
            --teal: #006D77;
            --teal-l: #83C5BE;
            --amber: #C8963E;
            --amber-l: #F4C262;
            --terracot: #B5451B;
            --sand: #F5EFE0;
            --sand-d: #EAE0CC;
            --navy: #1A2744;
            --slate: #4B5C6B;
            --white: #FFFFFF;
            --smoke: #F8F9FA;
            --radius: 16px;
            --radius-s: 10px;
            --sh: 0 4px 24px rgba(0, 0, 0, 0.08);
            --sh-lg: 0 12px 48px rgba(0, 0, 0, 0.14)
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--smoke);
            color: var(--navy);
            overflow-x: hidden
        }

        ::-webkit-scrollbar {
            width: 6px
        }

        ::-webkit-scrollbar-track {
            background: #eee
        }

        ::-webkit-scrollbar-thumb {
            background: var(--forest);
            border-radius: 10px
        }

        .marquee-bar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1001;
            background: linear-gradient(90deg, var(--forest), var(--teal), var(--forest));
            padding: 7px 0;
            display: flex;
            align-items: center;
            overflow: hidden
        }

        .marquee-badge {
            background: var(--amber);
            color: var(--navy);
            font-size: 10px;
            font-weight: 800;
            padding: 4px 14px;
            white-space: nowrap;
            letter-spacing: 1.2px;
            flex-shrink: 0;
            margin-right: 16px
        }

        .marquee-track {
            display: flex;
            gap: 52px;
            animation: marqueeRun 38s linear infinite;
            white-space: nowrap
        }

        .marquee-track span {
            font-size: 12px;
            color: white;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px
        }

        .marquee-track span i {
            color: var(--amber-l);
            font-size: 11px
        }

        @keyframes marqueeRun {
            0% {
                transform: translateX(0)
            }

            100% {
                transform: translateX(-50%)
            }
        }

        #navbar {
            position: fixed;
            top: 32px;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.0);
            transition: all 0.4s ease
        }

        #navbar.scrolled {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(14px);
            box-shadow: 0 2px 28px rgba(0, 0, 0, 0.1)
        }

        .nav-inner {
            max-width: 1300px;
            margin: 0 auto;
            padding: 14px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 11px;
            text-decoration: none
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: linear-gradient(135deg, var(--forest), var(--forest-l));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: white;
            font-weight: 900;
            border: 2px solid var(--amber);
            flex-shrink: 0
        }

        .brand-text .t1 {
            font-size: 15px;
            font-weight: 700;
            display: block
        }

        #navbar:not(.scrolled) .brand-text .t1 {
            color: white
        }

        #navbar.scrolled .brand-text .t1 {
            color: var(--navy)
        }

        .brand-text .t2 {
            font-size: 10px;
            color: var(--amber);
            font-weight: 600
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 2px;
            list-style: none
        }

        .nav-menu>li>a {
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 8px 13px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s
        }

        #navbar:not(.scrolled) .nav-menu>li>a {
            color: rgba(255, 255, 255, 0.92)
        }

        #navbar.scrolled .nav-menu>li>a {
            color: var(--slate)
        }

        .nav-menu>li>a:hover {
            background: rgba(27, 94, 47, 0.1);
            color: var(--forest)
        }

        .section {
            padding: 88px 0
        }

        .section-alt {
            background: white
        }

        .section-teal {
            background: linear-gradient(135deg, var(--teal) 0%, #004C55 100%)
        }

        .section-navy {
            background: var(--navy)
        }

        .section-sand {
            background: var(--sand)
        }

        .container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 28px
        }

        .sec-head {
            text-align: center;
            margin-bottom: 56px
        }

        .sec-pill {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(27, 94, 47, 0.08);
            color: var(--forest);
            padding: 5px 14px;
            border-radius: 100px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            margin-bottom: 12px
        }

        .sec-pill.light {
            background: rgba(255, 255, 255, 0.12);
            color: rgba(255, 255, 255, 0.85)
        }

        .sec-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(28px, 4vw, 44px);
            font-weight: 700;
            color: var(--navy);
            line-height: 1.2;
            margin-bottom: 12px
        }

        .sec-title span {
            color: var(--forest)
        }

        .sec-title.white {
            color: white
        }

        .sec-title span.amber {
            color: var(--amber-l)
        }

        .sec-desc {
            font-size: 15px;
            color: var(--slate);
            max-width: 560px;
            margin: 0 auto;
            line-height: 1.7
        }

        .sec-desc.light {
            color: rgba(255, 255, 255, 0.65)
        }

        .btn-green {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: var(--forest);
            color: white;
            padding: 13px 28px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.3s;
            border: none;
            cursor: pointer
        }

        .btn-green:hover {
            background: var(--forest-m);
            transform: translateY(-2px)
        }

        /* Hero */
        #hero {
            position: relative;
            height: 100vh;
            min-height: 620px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            overflow: hidden
        }

        .hero-slides {
            position: absolute;
            inset: 0
        }

        .hero-slide {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1.4s ease
        }

        .hero-slide.active {
            opacity: 1
        }

        .hero-slide::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(10, 25, 15, 0.45) 0%, rgba(5, 15, 8, 0.68) 100%)
        }

        .hs1 {
            background-image: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1800&q=80')
        }

        .hs2 {
            background-image: url('https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=1800&q=80')
        }

        .hs3 {
            background-image: url('https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?w=1800&q=80')
        }

        .hero-inner {
            position: relative;
            z-index: 2;
            max-width: 860px;
            padding: 0 24px
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(200, 150, 62, 0.2);
            border: 1px solid rgba(200, 150, 62, 0.5);
            padding: 6px 18px;
            border-radius: 100px;
            color: var(--amber-l);
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 20px
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(44px, 8vw, 94px);
            font-weight: 900;
            color: white;
            line-height: 1.02;
            margin-bottom: 18px
        }

        .hero-title .accent {
            color: var(--amber-l)
        }

        .hero-sub {
            font-size: 17px;
            color: rgba(255, 255, 255, 0.78);
            max-width: 580px;
            margin: 0 auto 36px;
            line-height: 1.7
        }

        .hero-ctas {
            display: flex;
            gap: 14px;
            justify-content: center;
            flex-wrap: wrap
        }

        .cta-primary {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: var(--amber);
            color: var(--navy);
            padding: 14px 30px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 14px;
            text-decoration: none;
            box-shadow: 0 4px 24px rgba(200, 150, 62, 0.4);
            transition: all 0.3s
        }

        .cta-primary:hover {
            background: var(--amber-l);
            transform: translateY(-2px)
        }

        .cta-ghost {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: rgba(255, 255, 255, 0.12);
            color: white;
            border: 1.5px solid rgba(255, 255, 255, 0.35);
            padding: 14px 30px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.3s
        }

        .hero-dots {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
            z-index: 3
        }

        .hdot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            cursor: pointer;
            transition: all 0.3s
        }

        .hdot.on {
            background: var(--amber);
            transform: scale(1.5)
        }

        /* Cards */
        .wcard {
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--sh);
            transition: all 0.3s;
            cursor: pointer;
            background: white
        }

        .wcard:hover {
            transform: translateY(-7px);
            box-shadow: var(--sh-lg)
        }

        .wcard-img {
            height: 240px;
            position: relative;
            overflow: hidden
        }

        .wcard-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s
        }

        .wcard:hover .wcard-img img {
            transform: scale(1.07)
        }

        .wcard-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.68) 0%, transparent 60%)
        }

        .wcard-rating {
            position: absolute;
            top: 13px;
            right: 13px;
            background: var(--amber);
            color: var(--navy);
            border-radius: 20px;
            padding: 4px 10px;
            font-size: 12px;
            font-weight: 700
        }

        .wcard-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 18px
        }

        .wcard-name {
            font-family: 'Playfair Display', serif;
            font-size: 19px;
            font-weight: 700;
            color: white;
            margin-bottom: 4px
        }

        .wcard-body {
            padding: 16px
        }

        .wcard-desc {
            font-size: 13px;
            color: var(--slate);
            line-height: 1.6;
            margin-bottom: 12px
        }

        /* Berita */
        .berita-featured {
            display: grid;
            grid-template-columns: 1.3fr 1fr;
            gap: 28px;
            margin-bottom: 28px
        }

        .bf-main {
            border-radius: var(--radius);
            overflow: hidden;
            background: white;
            box-shadow: var(--sh);
            display: flex;
            flex-direction: column;
            transition: all 0.3s;
            cursor: pointer
        }

        .bf-main:hover {
            transform: translateY(-5px);
            box-shadow: var(--sh-lg)
        }

        .bf-img {
            height: 280px;
            overflow: hidden;
            position: relative
        }

        .bf-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s
        }

        .bf-main:hover .bf-img img {
            transform: scale(1.06)
        }

        .bf-cat {
            position: absolute;
            top: 14px;
            left: 14px;
            background: var(--forest);
            color: white;
            font-size: 10px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 100px;
            letter-spacing: 0.5px;
            text-transform: uppercase
        }

        .bf-body {
            padding: 22px;
            flex: 1;
            display: flex;
            flex-direction: column
        }

        .bf-title {
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            font-weight: 700;
            color: var(--navy);
            line-height: 1.4;
            margin-bottom: 10px
        }

        .bf-excerpt {
            font-size: 13px;
            color: var(--slate);
            line-height: 1.65;
            flex: 1
        }

        .berita-side {
            display: flex;
            flex-direction: column;
            gap: 14px
        }

        .bside-item {
            background: white;
            border-radius: var(--radius-s);
            overflow: hidden;
            display: flex;
            box-shadow: var(--sh);
            transition: all 0.3s
        }

        .bside-item:hover {
            transform: translateX(4px)
        }

        .bside-img {
            width: 90px;
            height: 80px;
            flex-shrink: 0;
            overflow: hidden
        }

        .bside-img img {
            width: 100%;
            height: 100%;
            object-fit: cover
        }

        .bside-body {
            padding: 12px 14px;
            flex: 1
        }

        .bside-title {
            font-size: 13px;
            font-weight: 600;
            color: var(--navy);
            line-height: 1.4;
            margin-bottom: 5px
        }

        .bside-date {
            font-size: 11px;
            color: var(--slate)
        }

        /* Galeri */
        .galeri-masonry {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: 200px;
            gap: 14px
        }

        .gal-item {
            border-radius: 12px;
            overflow: hidden;
            cursor: pointer;
            position: relative
        }

        .gal-item.tall {
            grid-row: span 2
        }

        .gal-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s
        }

        .gal-item:hover img {
            transform: scale(1.07)
        }

        .gal-item-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0);
            transition: background 0.3s;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .gal-item:hover .gal-item-overlay {
            background: rgba(0, 0, 0, 0.35)
        }

        .gal-item-overlay i {
            color: white;
            font-size: 24px;
            opacity: 0;
            transition: opacity 0.3s
        }

        .gal-item:hover .gal-item-overlay i {
            opacity: 1
        }

        /* Layanan */
        .layanan-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px
        }

        .lay-card {
            background: white;
            border-radius: var(--radius);
            padding: 22px;
            box-shadow: var(--sh);
            transition: all 0.3s;
            display: flex;
            align-items: flex-start;
            gap: 14px
        }

        .lay-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--sh-lg)
        }

        .lay-icon {
            width: 46px;
            height: 46px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            flex-shrink: 0
        }

        .lay-icon.green {
            background: rgba(27, 94, 47, 0.1);
            color: var(--forest)
        }

        .lay-icon.teal {
            background: rgba(0, 109, 119, 0.1);
            color: var(--teal)
        }

        .lay-icon.amber {
            background: rgba(200, 150, 62, 0.1);
            color: var(--amber)
        }

        .lay-icon.slate {
            background: rgba(75, 92, 107, 0.1);
            color: var(--slate)
        }

        .lay-body h4 {
            font-size: 14px;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 5px
        }

        .lay-body p {
            font-size: 12px;
            color: var(--slate);
            line-height: 1.5
        }

        /* Kontak */
        .kontak-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px
        }

        .kontak-card {
            background: white;
            border-radius: var(--radius);
            padding: 20px;
            box-shadow: var(--sh);
            display: flex;
            align-items: center;
            gap: 14px;
            transition: all 0.3s
        }

        .kontak-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--sh-lg)
        }

        .kontak-av {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--forest);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0
        }

        .kontak-info h4 {
            font-size: 14px;
            font-weight: 700;
            color: var(--navy)
        }

        .kontak-info p {
            font-size: 12px;
            color: var(--slate)
        }

        /* Nomor Penting */
        .nomor-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px
        }

        .nomor-card {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 12px;
            padding: 18px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s
        }

        .nomor-card:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-3px)
        }

        .nomor-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            flex-shrink: 0
        }

        .nomor-icon.red {
            color: #f87171
        }

        .nomor-icon.blue {
            color: #60a5fa
        }

        .nomor-icon.teal {
            color: var(--teal-l)
        }

        .nomor-icon.amber {
            color: var(--amber-l)
        }

        .nomor-body h4 {
            font-size: 13px;
            font-weight: 700;
            color: white
        }

        .nomor-body p {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.55)
        }

        /* Pengumuman */
        .peng-item {
            background: white;
            border-radius: var(--radius-s);
            padding: 16px 18px;
            box-shadow: var(--sh);
            border-left: 4px solid var(--forest);
            display: flex;
            gap: 14px;
            transition: all 0.3s;
            margin-bottom: 12px
        }

        .peng-item:hover {
            transform: translateX(4px)
        }

        .peng-datebox {
            background: var(--forest);
            color: white;
            border-radius: 8px;
            padding: 8px 12px;
            text-align: center;
            flex-shrink: 0
        }

        .peng-datebox .pd-day {
            font-size: 22px;
            font-weight: 700;
            line-height: 1
        }

        .peng-datebox .pd-mon {
            font-size: 10px;
            opacity: 0.8
        }

        .peng-title {
            font-size: 14px;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 4px
        }

        .peng-exc {
            font-size: 12px;
            color: var(--slate)
        }

        /* Event */
        .event-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px
        }

        .ev-card {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--radius);
            overflow: hidden;
            transition: all 0.3s
        }

        .ev-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.1)
        }

        .ev-img {
            height: 160px;
            overflow: hidden
        }

        .ev-img img {
            width: 100%;
            height: 100%;
            object-fit: cover
        }

        .ev-body {
            padding: 16px
        }

        .ev-date {
            font-size: 11px;
            color: var(--amber-l);
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 5px
        }

        .ev-name {
            font-family: 'Playfair Display', serif;
            font-size: 16px;
            font-weight: 700;
            color: white;
            margin-bottom: 6px
        }

        .ev-loc {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.55);
            display: flex;
            align-items: center;
            gap: 5px
        }

        /* Footer */
        footer {
            background: var(--navy);
            color: white;
            padding: 56px 0 24px
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px
        }

        .footer-brand h3 {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            margin-bottom: 10px
        }

        .footer-brand p {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.55);
            line-height: 1.7
        }

        footer h4 {
            font-size: 13px;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px
        }

        footer ul {
            list-style: none
        }

        footer ul li {
            margin-bottom: 9px
        }

        footer ul li a {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.55);
            text-decoration: none;
            transition: color 0.2s
        }

        footer ul li a:hover {
            color: var(--amber-l)
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 20px;
            text-align: center;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.4)
        }

        @media(max-width:1024px) {
            .berita-featured {
                grid-template-columns: 1fr
            }

            .layanan-grid {
                grid-template-columns: 1fr 1fr
            }

            .kontak-grid {
                grid-template-columns: 1fr 1fr
            }

            .nomor-grid {
                grid-template-columns: 1fr 1fr
            }

            .galeri-masonry {
                grid-template-columns: repeat(3, 1fr)
            }
        }

        @media(max-width:768px) {

            .nav-menu,
            .nav-actions {
                display: none
            }

            .section {
                padding: 52px 0
            }

            .berita-featured {
                grid-template-columns: 1fr
            }

            .event-grid {
                grid-template-columns: 1fr
            }

            .layanan-grid {
                grid-template-columns: 1fr 1fr
            }

            .kontak-grid {
                grid-template-columns: 1fr
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 24px
            }
        }
    </style>
    @yield('extra-head')
</head>

<body>
    @yield('body')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            document.getElementById('navbar')?.classList.toggle('scrolled', window.scrollY > 60)
        });
        // Hero slideshow
        (function() {
            const slides = document.querySelectorAll('.hero-slide');
            const dots = document.querySelectorAll('.hdot');
            if (!slides.length) return;
            let cur = 0;

            function go(n) {
                slides[cur].classList.remove('active');
                dots[cur]?.classList.remove('on');
                cur = n;
                slides[cur].classList.add('active');
                dots[cur]?.classList.add('on')
            }
            setInterval(() => go((cur + 1) % slides.length), 5000);
            dots.forEach((d, i) => d.addEventListener('click', () => go(i)));
        })();
    </script>
    @yield('extra-scripts')
</body>

</html>