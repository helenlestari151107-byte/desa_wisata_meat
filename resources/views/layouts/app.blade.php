<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $profil->nama_desa ?? 'Desa Wisata Meat' }} — Pesona Danau Toba</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,900;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css">
<style>

/* ============ CSS VARIABLES ============ */
:root {
  --forest:   #1B5E2F;
  --forest-m: #2E7D4F;
  --forest-l: #4CAF73;
  --teal:     #006D77;
  --teal-l:   #83C5BE;
  --amber:    #C8963E;
  --amber-l:  #F4C262;
  --terracot: #B5451B;
  --sand:     #F5EFE0;
  --sand-d:   #EAE0CC;
  --navy:     #1A2744;
  --slate:    #4B5C6B;
  --white:    #FFFFFF;
  --smoke:    #F8F9FA;
  --radius:   16px;
  --radius-s: 10px;
  --sh:       0 4px 24px rgba(0,0,0,0.08);
  --sh-lg:    0 12px 48px rgba(0,0,0,0.14);
}

*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth;scroll-padding-top:90px}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--smoke);color:var(--navy);overflow-x:hidden}
::-webkit-scrollbar{width:6px}
::-webkit-scrollbar-track{background:#eee}
::-webkit-scrollbar-thumb{background:var(--forest);border-radius:10px}

/* loader & transition removed */


/* ============ BREADCRUMB ============ */
.page-breadcrumb {
  background: var(--sand);
  padding: 12px 0;
  border-bottom: 1px solid var(--sand-d);
  margin-top: 64px; /* below navbar */
}
.page-breadcrumb .container {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 13px;
  color: var(--slate);
}
.page-breadcrumb a {
  color: var(--forest);
  text-decoration: none;
  font-weight: 600;
}
.page-breadcrumb a:hover { text-decoration: underline; }
.page-breadcrumb .bc-sep { color: var(--slate); opacity: 0.5; }
.page-breadcrumb .bc-current { font-weight: 700; color: var(--navy); }

/* ============ SPA PAGE ROUTER ============ */
.site-page { display: none; }
.site-page.active { display: block; }
#page-beranda.active { display: block; }


/* ============ MARQUEE TOP ============ */
.marquee-bar{
  position:fixed;top:0;left:0;right:0;z-index:1001;
  background:linear-gradient(90deg,var(--forest),var(--teal),var(--forest));
  padding:7px 0;display:flex;align-items:center;overflow:hidden;
}
.marquee-badge{
  background:var(--amber);color:var(--navy);
  font-size:10px;font-weight:800;padding:4px 14px;
  white-space:nowrap;letter-spacing:1.2px;flex-shrink:0;margin-right:16px;
}
/* pembungkus */
.marquee-track{
  flex:1;
  overflow:hidden; /* pembatas */  
}

/* yang jalan */
.marquee-inner{
  display:flex;
  gap:52px;
  white-space:nowrap;
  animation:marqueeRun 10s linear infinite;
}

/* teks */
.marquee-inner span{
  font-size:15px;
  color:white;
  font-weight:500;
  display:flex;
  align-items:center;
  gap:8px;
}

.marquee-inner span i{
  color:var(--amber-l);
  font-size:11px;
}

/* animasi */
@keyframes marqueeRun{
  0%{transform:translateX(0)}
  100%{transform:translateX(-50%)}
}

/* ============ NAVBAR ============ */
#navbar{
  position:fixed;top:32px;left:0;right:0;z-index:1000;
  background:rgba(255,255,255,0.0);transition:all 0.4s ease;
}
#navbar.scrolled{
  background:rgba(255,255,255,0.97);backdrop-filter:blur(14px);
  box-shadow:0 2px 28px rgba(0,0,0,0.1);top:32px;
}
.nav-inner{
  max-width:1300px;margin:0 auto;padding:14px 28px;
  display:flex;align-items:center;justify-content:space-between;
}
.nav-brand{display:flex;align-items:center;gap:11px;text-decoration:none}
.brand-icon{
  width:42px;height:42px;border-radius:11px;
  background:linear-gradient(135deg,var(--forest),var(--forest-l));
  display:flex;align-items:center;justify-content:center;
  font-size:18px;color:white;font-weight:900;font-family:'Playfair Display',serif;
  border:2px solid var(--amber);flex-shrink:0;
}
.brand-text{line-height:1.15}
.brand-text .t1{font-family:'Playfair Display',serif;font-size:15px;font-weight:700;display:block}
#navbar:not(.scrolled) .brand-text .t1{color:white}
#navbar.scrolled .brand-text .t1{color:var(--navy)}
.brand-text .t2{font-size:10px;color:var(--amber);font-weight:600;letter-spacing:0.5px}
.nav-menu{display:flex;align-items:center;gap:2px;list-style:none}
.nav-menu > li{position:relative}
.nav-menu > li > a{
  display:flex;align-items:center;gap:4px;
  padding:8px 13px;border-radius:8px;font-size:13px;font-weight:600;
  text-decoration:none;transition:all 0.2s;letter-spacing:0.1px;
}
#navbar:not(.scrolled) .nav-menu > li > a{color:rgba(255,255,255,0.92)}
#navbar.scrolled .nav-menu > li > a{color:var(--slate)}
.nav-menu > li > a:hover{background:rgba(27,94,47,0.1);color:var(--forest)}
#navbar:not(.scrolled) .nav-menu > li > a:hover{background:rgba(255,255,255,0.15);color:white}

/* Active nav link */
#navbar.scrolled .nav-menu > li > a.nav-active { color: var(--forest); font-weight: 700; }
#navbar:not(.scrolled) .nav-menu > li > a.nav-active { color: var(--amber-l); }
.drawer-nav a.nav-active { color: var(--forest); background: var(--sand); }

/* Dropdown */
.dd-menu{
  position:absolute;top:calc(100% + 10px);left:0;
  background:white;border-radius:12px;box-shadow:var(--sh-lg);
  min-width:210px;opacity:0;visibility:hidden;transform:translateY(-8px);
  transition:all 0.25s;z-index:9999;border-top:3px solid var(--forest);
  padding:6px 0;
}
.nav-menu > li:hover .dd-menu{opacity:1;visibility:visible;transform:translateY(0)}
.dd-menu a{
  display:flex;align-items:center;gap:10px;padding:10px 18px;
  font-size:13px;font-weight:500;color:var(--slate);text-decoration:none;
  transition:all 0.2s;
}
.dd-menu a i{width:16px;color:var(--forest-m);font-size:13px}
.dd-menu a:hover{background:var(--sand);color:var(--forest);padding-left:24px}
.dd-divider{height:1px;background:#f0f0f0;margin:4px 0}
/* Actions */
.nav-actions{display:flex;align-items:center;gap:8px}
.btn-lang-grp{display:flex;gap:3px}
.btn-lang{
  padding:5px 10px;border-radius:7px;border:1.5px solid;
  font-size:12px;font-weight:700;cursor:pointer;transition:all 0.2s;
}
#navbar:not(.scrolled) .btn-lang{border-color:rgba(255,255,255,0.4);background:transparent;color:rgba(255,255,255,0.8)}
#navbar:not(.scrolled) .btn-lang.active{background:rgba(255,255,255,0.2);color:white;border-color:rgba(255,255,255,0.6)}
#navbar.scrolled .btn-lang{border-color:var(--sand-d);background:var(--smoke);color:var(--slate)}
#navbar.scrolled .btn-lang.active{background:var(--forest);color:white;border-color:var(--forest)}
.btn-srch{
  width:34px;height:34px;border-radius:8px;border:none;cursor:pointer;
  display:flex;align-items:center;justify-content:center;font-size:14px;transition:all 0.2s;
}
#navbar:not(.scrolled) .btn-srch{background:rgba(255,255,255,0.15);color:white}
#navbar.scrolled .btn-srch{background:var(--smoke);color:var(--slate)}
.btn-srch:hover{background:var(--forest)!important;color:white!important}

/* ============ VISITOR COUNTER (inside hero bottom-left) ============ */
.visit-pill{
  position:absolute;bottom:42px;left:40px;z-index:10;
  background:rgba(255,255,255,0.95);backdrop-filter:blur(12px);
  border-radius:50px;padding:11px 18px 11px 14px;
  box-shadow:0 6px 32px rgba(0,0,0,0.22);
  display:flex;align-items:center;gap:10px;
  animation:slideL 0.8s cubic-bezier(0.34,1.56,0.64,1) 2.2s both;
}
@keyframes slideL{from{transform:translateX(-70px);opacity:0}to{transform:translateX(0);opacity:1}}
.visit-pill .vp-icon{color:var(--forest);font-size:18px}
.visit-pill .vp-label{font-size:13px;color:var(--navy);font-weight:600}
.visit-pill .vp-num{
  background:var(--forest);
  color:white;border-radius:30px;padding:4px 14px;
  font-size:14px;font-weight:800;letter-spacing:0.5px;
  min-width:52px;text-align:center;
}

/* ============ HERO ============ */
#hero{
  position:relative;height:100vh;min-height:620px;
  display:flex;align-items:center;justify-content:center;text-align:center;
  overflow:hidden;
}
.hero-slides{position:absolute;inset:0}
.hero-slide{
  position:absolute;inset:0;background-size:cover;background-position:center;
  opacity:0;transition:opacity 1.4s ease;
}
.hero-slide.active{opacity:1}
.hero-slide::after{
  content:'';position:absolute;inset:0;
  background:linear-gradient(to bottom,rgba(10,25,15,0.45) 0%,rgba(5,15,8,0.68) 100%);
}
/* Real Unsplash landscape images */
.hs1{
  background-image: url('/images/meat1.jpeg');
}
.hs2{
  background-image: url('/images/meat2.jpg');
}
.hs3{
  background-image: url('/images/meat3.jpeg');
}
.hero-inner{position:relative;z-index:2;max-width:860px;padding:0 24px}
.hero-badge{
  display:inline-flex;align-items:center;gap:8px;
  background:rgba(200,150,62,0.2);border:1px solid rgba(200,150,62,0.5);
  padding:6px 18px;border-radius:100px;color:var(--amber-l);
  font-size:12px;font-weight:600;letter-spacing:1px;margin-bottom:20px;
  animation:fadeUp 0.8s ease 0.3s both;
}
.hero-title{
  font-family:'Playfair Display',serif;
  font-size:clamp(44px,8vw,94px);font-weight:900;
  color:white;line-height:1.02;margin-bottom:18px;
  animation:fadeUp 0.9s ease 0.5s both;
}
.hero-title .accent{color:var(--amber-l)}
.hero-sub{
  font-size:17px;color:rgba(255,255,255,0.78);max-width:580px;
  margin:0 auto 36px;line-height:1.7;
  animation:fadeUp 0.9s ease 0.7s both;
}
.hero-ctas{display:flex;gap:14px;justify-content:center;flex-wrap:wrap;animation:fadeUp 0.9s ease 0.9s both}
.cta-primary{
  display:inline-flex;align-items:center;gap:9px;
  background:var(--amber);color:var(--navy);
  padding:14px 30px;border-radius:50px;font-weight:700;font-size:14px;text-decoration:none;
  box-shadow:0 4px 24px rgba(200,150,62,0.4);transition:all 0.3s;
}
.cta-primary:hover{background:var(--amber-l);transform:translateY(-2px);box-shadow:0 8px 36px rgba(200,150,62,0.55)}
.cta-ghost{
  display:inline-flex;align-items:center;gap:9px;
  background:rgba(255,255,255,0.12);color:white;
  border:1.5px solid rgba(255,255,255,0.35);
  padding:14px 30px;border-radius:50px;font-weight:600;font-size:14px;text-decoration:none;
  backdrop-filter:blur(8px);transition:all 0.3s;
}
.cta-ghost:hover{background:rgba(255,255,255,0.2);transform:translateY(-2px)}
/* Slide controls */
.hero-prev,.hero-next{
  position:absolute;top:50%;z-index:3;transform:translateY(-50%);
  width:48px;height:48px;border-radius:50%;border:2px solid rgba(255,255,255,0.4);
  background:rgba(255,255,255,0.12);color:white;font-size:18px;
  display:flex;align-items:center;justify-content:center;cursor:pointer;
  backdrop-filter:blur(6px);transition:all 0.2s;
}
.hero-prev{left:28px}.hero-next{right:28px}
.hero-prev:hover,.hero-next:hover{background:var(--amber);border-color:var(--amber);color:var(--navy)}
.hero-dots{position:absolute;bottom:40px;left:50%;transform:translateX(-50%);display:flex;gap:8px;z-index:3}
.hdot{width:8px;height:8px;border-radius:50%;background:rgba(255,255,255,0.4);cursor:pointer;transition:all 0.3s}
.hdot.on{background:var(--amber);transform:scale(1.5)}
/* Scroll hint */
.scroll-hint{
  position:absolute;bottom:60px;right:40px;z-index:3;
  display:flex;flex-direction:column;align-items:center;gap:6px;
  color:rgba(255,255,255,0.55);font-size:11px;letter-spacing:1px;
}
.scroll-mouse{width:22px;height:36px;border:2px solid rgba(255,255,255,0.4);border-radius:100px;display:flex;align-items:flex-start;justify-content:center;padding-top:5px}
.scroll-mouse::before{content:'';width:4px;height:8px;background:var(--amber-l);border-radius:100px;animation:scrollBob 1.8s ease-in-out infinite}
@keyframes scrollBob{0%,100%{transform:translateY(0);opacity:1}70%{transform:translateY(10px);opacity:0.3}}

/* ============ QUICKLINKS STRIP ============ */
.qstrip{background:var(--forest);display:grid;grid-template-columns:repeat(4,1fr)}
.qitem{
  padding:18px 20px;display:flex;align-items:center;gap:14px;
  border-right:1px solid rgba(255,255,255,0.1);
  cursor:pointer;transition:background 0.2s;text-decoration:none;
}
.qitem:last-child{border-right:none}
.qitem:hover{background:var(--forest-m)}
.qi-icon{
  width:44px;height:44px;border-radius:10px;
  background:rgba(255,255,255,0.12);
  display:flex;align-items:center;justify-content:center;
  font-size:20px;color:var(--amber-l);flex-shrink:0;
}
.qi-text .l1{font-size:10px;color:rgba(255,255,255,0.55);letter-spacing:0.5px}
.qi-text .l2{font-size:14px;font-weight:700;color:white}

/* ============ SECTION COMMONS ============ */
.section{padding:88px 0}
.section-alt{background:white}
.section-teal{background:linear-gradient(135deg,var(--teal) 0%,#004C55 100%)}
.section-navy{background:var(--navy)}
.section-sand{background:var(--sand)}
.container{max-width:1300px;margin:0 auto;padding:0 28px}
.sec-head{text-align:center;margin-bottom:56px}
.sec-pill{
  display:inline-flex;align-items:center;gap:7px;
  background:rgba(27,94,47,0.08);color:var(--forest);
  padding:5px 14px;border-radius:100px;
  font-size:11px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;margin-bottom:12px;
}
.sec-pill.light{background:rgba(255,255,255,0.12);color:rgba(255,255,255,0.85)}
.sec-title{
  font-family:'Playfair Display',serif;
  font-size:clamp(28px,4vw,44px);font-weight:700;color:var(--navy);line-height:1.2;margin-bottom:12px;
}
.sec-title span{color:var(--forest)}
.sec-title.white{color:white}
.sec-title span.amber{color:var(--amber-l)}
.sec-desc{font-size:15px;color:var(--slate);max-width:560px;margin:0 auto;line-height:1.7}
.sec-desc.light{color:rgba(255,255,255,0.65)}

/* Btn */
.btn-green{
  display:inline-flex;align-items:center;gap:9px;
  background:var(--forest);color:white;padding:13px 28px;border-radius:50px;
  font-weight:700;font-size:14px;text-decoration:none;transition:all 0.3s;border:none;cursor:pointer;
}
.btn-green:hover{background:var(--forest-m);transform:translateY(-2px);box-shadow:0 6px 24px rgba(27,94,47,0.3)}
.btn-amber{
  display:inline-flex;align-items:center;gap:9px;
  background:var(--amber);color:var(--navy);padding:13px 28px;border-radius:50px;
  font-weight:700;font-size:14px;text-decoration:none;transition:all 0.3s;border:none;cursor:pointer;
}
.btn-amber:hover{background:var(--amber-l);transform:translateY(-2px)}
.btn-outline{
  display:inline-flex;align-items:center;gap:9px;
  border:2px solid var(--forest);color:var(--forest);padding:11px 26px;border-radius:50px;
  font-weight:700;font-size:14px;text-decoration:none;transition:all 0.3s;background:transparent;cursor:pointer;
}
.btn-outline:hover{background:var(--forest);color:white}

/* ============ PROFIL SECTION ============ */
.profil-grid{display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center}
.profil-img-wrap{position:relative}
.profil-main-img{
  border-radius:24px;overflow:hidden;height:440px;
  background-image:url('https://images.unsplash.com/photo-1482822683622-00effad5052e?w=800&q=80');
  background-size:cover;background-position:center;
  box-shadow:var(--sh-lg);
}
.profil-float1{
  position:absolute;bottom:-20px;right:-20px;
  background:var(--amber);color:var(--navy);border-radius:18px;
  padding:18px 22px;text-align:center;box-shadow:var(--sh-lg);z-index:2;
}
.profil-float1 .pf-num{font-family:'Playfair Display',serif;font-size:30px;font-weight:700;display:block;line-height:1}
.profil-float1 .pf-txt{font-size:11px;font-weight:600;margin-top:3px}
.profil-float2{
  position:absolute;top:-16px;left:-16px;
  background:var(--teal);color:white;border-radius:14px;
  padding:14px 18px;box-shadow:var(--sh-lg);z-index:2;display:flex;align-items:center;gap:10px;
}
.profil-float2 i{font-size:22px;color:var(--teal-l)}
.profil-float2 .pf2-val{font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:white;display:block;line-height:1}
.profil-float2 .pf2-lbl{font-size:10px;color:rgba(255,255,255,0.7)}
.profil-text h2{font-family:'Playfair Display',serif;font-size:38px;font-weight:700;color:var(--navy);margin-bottom:16px;line-height:1.2}
.profil-text p{font-size:14px;color:var(--slate);line-height:1.85;margin-bottom:18px}
.profil-facts{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin:24px 0}
.pf-item{
  background:var(--sand);border-radius:var(--radius-s);
  padding:13px 15px;display:flex;align-items:center;gap:12px;
}
.pfi-icon{width:36px;height:36px;border-radius:8px;background:var(--forest);color:white;display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0}
.pfi-lbl{font-size:10px;color:var(--slate);text-transform:uppercase;letter-spacing:0.5px}
.pfi-val{font-size:13px;font-weight:700;color:var(--navy)}

/* INFO DESA TABS */
.info-tabs-wrap{background:var(--sand-d);border-radius:12px;padding:5px;display:flex;gap:3px;margin-bottom:32px;overflow-x:auto}
.itab{
  padding:10px 20px;border-radius:9px;border:none;background:transparent;
  color:var(--slate);font-size:13px;font-weight:600;cursor:pointer;transition:all 0.2s;white-space:nowrap;font-family:inherit;
}
.itab.on{background:white;color:var(--forest);box-shadow:0 2px 10px rgba(0,0,0,0.08)}
.itp{display:none}.itp.on{display:block;animation:fadeUp 0.4s ease}

/* Struktur Pemerintahan Bagan */
.bagan-wrap{padding:20px 0}
.bagan-row{display:flex;justify-content:center;gap:20px;margin-bottom:8px;position:relative}
.bagan-row:not(:last-child)::after{content:'';position:absolute;bottom:-8px;left:50%;width:2px;height:8px;background:var(--sand-d)}
.bagan-box{
  background:white;border-radius:12px;padding:14px 20px;text-align:center;
  box-shadow:var(--sh);border-top:3px solid var(--forest);min-width:160px;
}
.bagan-box.top{border-top-color:var(--amber);background:linear-gradient(135deg,var(--forest),var(--forest-m));color:white}
.bagan-box.top .bb-title{color:white}.bagan-box.top .bb-name{color:rgba(255,255,255,0.8)}
.bagan-box.teal{border-top-color:var(--teal)}
.bagan-box.amber{border-top-color:var(--amber)}
.bb-title{font-size:11px;color:var(--slate);text-transform:uppercase;letter-spacing:0.5px;margin-bottom:5px}
.bb-name{font-size:13px;font-weight:700;color:var(--navy)}
.bagan-line-group{display:flex;justify-content:center;gap:20px;position:relative;padding-top:16px}
.bagan-line-group::before{content:'';position:absolute;top:0;left:50%;transform:translateX(-50%);width:calc(100% - 80px);height:2px;background:var(--sand-d)}

/* ============ INFOGRAFIS ============ */
.infografis-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;margin-bottom:40px}
.ig-card{
  background:rgba(255,255,255,0.07);border:1px solid rgba(255,255,255,0.12);
  border-radius:var(--radius);padding:26px 20px;text-align:center;
  transition:all 0.3s;position:relative;overflow:hidden;cursor:pointer;
}
.ig-card::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,rgba(255,255,255,0.03),rgba(255,255,255,0.08));opacity:0;transition:opacity 0.3s}
.ig-card:hover{transform:translateY(-5px);background:rgba(255,255,255,0.12)}.ig-card:hover::before{opacity:1}
.ig-card::after{content:'';position:absolute;bottom:0;left:0;right:0;height:3px;background:var(--amber)}
.ig-icon{width:58px;height:58px;margin:0 auto 14px;border-radius:50%;background:rgba(255,255,255,0.1);display:flex;align-items:center;justify-content:center;font-size:24px;color:var(--amber-l)}
.ig-num{font-family:'Playfair Display',serif;font-size:40px;font-weight:700;color:white;line-height:1}
.ig-lbl{font-size:13px;color:rgba(255,255,255,0.65);margin-top:6px}
.charts-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
.chart-card{background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.1);border-radius:var(--radius);padding:24px}
.chart-card h4{color:white;font-size:15px;font-weight:600;margin-bottom:20px;display:flex;align-items:center;gap:8px}
.chart-card h4 i{color:var(--amber-l)}
.bar-row{display:flex;align-items:center;gap:10px;margin-bottom:12px}
.bar-lbl{font-size:11px;color:rgba(255,255,255,0.6);width:90px;flex-shrink:0}
.bar-track{flex:1;height:8px;background:rgba(255,255,255,0.07);border-radius:100px;overflow:hidden}
.bar-fill{height:100%;border-radius:100px;transition:width 1.6s cubic-bezier(0.4,0,0.2,1)}
.bar-fill.green{background:linear-gradient(90deg,var(--forest-m),var(--forest-l))}
.bar-fill.teal{background:linear-gradient(90deg,var(--teal),var(--teal-l))}
.bar-fill.amber{background:linear-gradient(90deg,var(--amber),var(--amber-l))}
.bar-fill.terracot{background:linear-gradient(90deg,var(--terracot),#e06b3f)}
.bar-val{font-size:11px;color:var(--amber-l);width:38px;text-align:right;font-weight:600}
/* Donut */
.donut-wrap{display:flex;align-items:center;justify-content:center;gap:20px;margin-bottom:16px}
.donut-legend{display:flex;flex-direction:column;gap:8px}
.dleg{display:flex;align-items:center;gap:8px;font-size:11px;color:rgba(255,255,255,0.65)}
.dleg-dot{width:10px;height:10px;border-radius:50%;flex-shrink:0}

/* ============ BERITA (style kersik.desa.id) ============ */
.berita-featured{
  display:grid;grid-template-columns:1.3fr 1fr;gap:28px;margin-bottom:28px;
}
.bf-main{
  border-radius:var(--radius);overflow:hidden;
  background:white;box-shadow:var(--sh);display:flex;flex-direction:column;
  transition:all 0.3s;cursor:pointer;
}
.bf-main:hover{transform:translateY(-5px);box-shadow:var(--sh-lg)}
.bf-img{height:280px;overflow:hidden;position:relative}
.bf-img img{width:100%;height:100%;object-fit:cover;transition:transform 0.5s}
.bf-main:hover .bf-img img{transform:scale(1.06)}
.bf-cat{position:absolute;top:14px;left:14px;background:var(--forest);color:white;font-size:10px;font-weight:700;padding:4px 12px;border-radius:100px;letter-spacing:0.5px;text-transform:uppercase}
.bf-cat.teal{background:var(--teal)}
.bf-cat.amber{background:var(--amber);color:var(--navy)}
.bf-cat.terracot{background:var(--terracot)}
.bf-body{padding:22px;flex:1;display:flex;flex-direction:column}
.bf-meta{display:flex;align-items:center;gap:12px;margin-bottom:10px}
.bf-date{font-size:11px;color:var(--slate);display:flex;align-items:center;gap:4px}
.bf-views{font-size:11px;color:var(--slate);display:flex;align-items:center;gap:4px}
.bf-title{font-family:'Playfair Display',serif;font-size:18px;font-weight:700;color:var(--navy);line-height:1.4;margin-bottom:10px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.bf-excerpt{font-size:13px;color:var(--slate);line-height:1.65;flex:1;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}
.bf-footer{display:flex;align-items:center;justify-content:space-between;margin-top:14px;padding-top:14px;border-top:1px solid var(--sand-d)}
.bf-author{display:flex;align-items:center;gap:8px}
.bf-av{width:28px;height:28px;border-radius:50%;background:var(--forest);color:white;font-size:11px;font-weight:700;display:flex;align-items:center;justify-content:center}
.bf-an{font-size:12px;font-weight:600;color:var(--navy)}
.readmore{font-size:12px;font-weight:700;color:var(--forest);text-decoration:none;display:flex;align-items:center;gap:4px;transition:gap 0.2s}
.readmore:hover{gap:8px}
/* Berita side list */
.berita-side{display:flex;flex-direction:column;gap:14px}
.bside-item{background:white;border-radius:var(--radius-s);overflow:hidden;display:flex;gap:0;box-shadow:var(--sh);transition:all 0.3s;cursor:pointer}
.bside-item:hover{transform:translateX(4px);box-shadow:var(--sh-lg)}
.bside-img{width:90px;height:80px;flex-shrink:0;background:var(--sand);overflow:hidden}
.bside-img img{width:100%;height:100%;object-fit:cover;transition:transform 0.4s}
.bside-item:hover .bside-img img{transform:scale(1.1)}
.bside-body{padding:12px 14px;flex:1;display:flex;flex-direction:column;justify-content:center}
.bside-cat{font-size:9px;font-weight:700;color:var(--forest);text-transform:uppercase;letter-spacing:0.8px;margin-bottom:4px}
.bside-title{font-size:13px;font-weight:600;color:var(--navy);line-height:1.4;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;margin-bottom:5px}
.bside-date{font-size:11px;color:var(--slate)}
/* Berita grid small */
.berita-grid-sm{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-top:28px}
.bg-sm-card{background:white;border-radius:var(--radius);overflow:hidden;box-shadow:var(--sh);transition:all 0.3s;cursor:pointer;display:flex;flex-direction:column}
.bg-sm-card:hover{transform:translateY(-5px);box-shadow:var(--sh-lg)}
.bg-sm-img{height:160px;overflow:hidden;position:relative}
.bg-sm-img img{width:100%;height:100%;object-fit:cover;transition:transform 0.5s}
.bg-sm-card:hover .bg-sm-img img{transform:scale(1.08)}
.bg-sm-body{padding:16px;flex:1;display:flex;flex-direction:column}
.bg-sm-title{font-size:14px;font-weight:600;color:var(--navy);line-height:1.4;margin-bottom:8px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.bg-sm-meta{display:flex;align-items:center;justify-content:space-between;margin-top:auto}
.bg-sm-date{font-size:11px;color:var(--slate)}

/* ============ POTENSI WISATA ============ */
.wisata-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px}
.wcard{border-radius:var(--radius);overflow:hidden;box-shadow:var(--sh);transition:all 0.3s;cursor:pointer;background:white}
.wcard:hover{transform:translateY(-7px);box-shadow:var(--sh-lg)}
.wcard-img{height:240px;position:relative;overflow:hidden}
.wcard-img img{width:100%;height:100%;object-fit:cover;transition:transform 0.5s}
.wcard:hover .wcard-img img{transform:scale(1.07)}
.wcard-overlay{position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.68) 0%,transparent 60%)}
.wcard-rating{position:absolute;top:13px;right:13px;background:var(--amber);color:var(--navy);border-radius:20px;padding:4px 10px;font-size:12px;font-weight:700;display:flex;align-items:center;gap:4px}
.wcard-badge{position:absolute;top:13px;left:13px;background:rgba(255,255,255,0.15);color:white;backdrop-filter:blur(4px);border:1px solid rgba(255,255,255,0.3);border-radius:100px;padding:4px 12px;font-size:11px;font-weight:600}
.wcard-info{position:absolute;bottom:0;left:0;right:0;padding:18px}
.wcard-name{font-family:'Playfair Display',serif;font-size:19px;font-weight:700;color:white;margin-bottom:4px}
.wcard-loc{font-size:12px;color:rgba(255,255,255,0.75);display:flex;align-items:center;gap:5px}
.wcard-body{padding:16px}
.wcard-desc{font-size:13px;color:var(--slate);line-height:1.6;margin-bottom:12px}
.wcard-tags{display:flex;gap:6px;flex-wrap:wrap}
.wtag{background:var(--sand);color:var(--forest);font-size:10px;font-weight:700;padding:3px 10px;border-radius:100px;letter-spacing:0.3px}
.wisata-filter{display:flex;gap:8px;justify-content:center;flex-wrap:wrap;margin-bottom:32px}
.wfbtn{padding:8px 20px;border-radius:50px;border:2px solid var(--forest);background:white;color:var(--forest);font-size:13px;font-weight:600;cursor:pointer;transition:all 0.2s;font-family:inherit}
.wfbtn.on,.wfbtn:hover{background:var(--forest);color:white}

/* ============ GALERI (simkopdes style) ============ */
.galeri-filter-row{display:flex;gap:8px;justify-content:center;flex-wrap:wrap;margin-bottom:30px}
.gfbtn{padding:8px 20px;border-radius:50px;border:2px solid var(--teal);background:white;color:var(--teal);font-size:13px;font-weight:600;cursor:pointer;transition:all 0.2s;font-family:inherit}
.gfbtn.on,.gfbtn:hover{background:var(--teal);color:white}
.galeri-masonry{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  grid-auto-rows:200px;
  gap:14px;
}
.gitem{border-radius:12px;overflow:hidden;cursor:pointer;position:relative;transition:all 0.3s}
.gitem.w2{grid-column:span 2}
.gitem.h2{grid-row:span 2}
.gitem:hover{transform:scale(1.02);z-index:2;box-shadow:var(--sh-lg)}
.gitem img{width:100%;height:100%;object-fit:cover;transition:transform 0.5s}
.gitem:hover img{transform:scale(1.07)}
.g-overlay{
  position:absolute;inset:0;
  background:rgba(0,109,119,0.78);
  opacity:0;transition:opacity 0.3s;
  display:flex;flex-direction:column;align-items:center;justify-content:center;padding:16px;text-align:center;
}
.gitem:hover .g-overlay{opacity:1}
.g-overlay i{font-size:28px;color:var(--amber-l);margin-bottom:8px}
.g-overlay span{font-size:13px;font-weight:600;color:white}
.g-vbadge{position:absolute;bottom:10px;left:10px;background:rgba(0,0,0,0.65);color:white;border-radius:100px;padding:3px 10px;font-size:11px;display:flex;align-items:center;gap:5px}

/* ============ LAYANAN ============ */
.layanan-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px}
.lcard{
  background:white;border-radius:var(--radius);padding:26px 18px;text-align:center;
  transition:all 0.3s;cursor:pointer;position:relative;overflow:hidden;
  border-bottom:3px solid transparent;
}
.lcard:hover{transform:translateY(-5px);box-shadow:var(--sh-lg);border-bottom-color:var(--forest)}
.lcard::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--forest),var(--teal));transform:scaleX(0);transition:transform 0.3s;transform-origin:left}
.lcard:hover::before{transform:scaleX(1)}
.lcard-icon{
  width:62px;height:62px;margin:0 auto 14px;border-radius:16px;
  display:flex;align-items:center;justify-content:center;font-size:26px;color:white;
  transition:transform 0.3s;
}
.lcard:hover .lcard-icon{transform:scale(1.1) rotate(-6deg)}
.l-green{background:linear-gradient(135deg,var(--forest),var(--forest-l))}
.l-teal{background:linear-gradient(135deg,var(--teal),var(--teal-l))}
.l-amber{background:linear-gradient(135deg,var(--amber),var(--amber-l))}
.l-terracot{background:linear-gradient(135deg,var(--terracot),#e06b3f)}
.l-navy{background:linear-gradient(135deg,var(--navy),#2a3f6b)}
.l-slate{background:linear-gradient(135deg,var(--slate),#7a8fa0)}
.lcard-title{font-size:14px;font-weight:700;color:var(--navy);margin-bottom:6px}
.lcard-desc{font-size:12px;color:var(--slate);line-height:1.55}
.lcard-link{display:inline-flex;align-items:center;gap:4px;margin-top:12px;font-size:12px;font-weight:700;color:var(--forest);text-decoration:none;transition:gap 0.2s}
.lcard-link:hover{gap:8px}

/* ============ KONTAK PENTING ============ */
.kontak-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}
.kcard{
  border-radius:var(--radius);padding:22px 20px;
  display:flex;align-items:center;gap:16px;
  transition:transform 0.3s;cursor:pointer;
}
.kcard:hover{transform:translateY(-4px)}
.kcard.red{background:linear-gradient(135deg,#fef2f2,#fee2e2);border-left:4px solid #dc2626}
.kcard.blue{background:linear-gradient(135deg,#eff6ff,#dbeafe);border-left:4px solid #2563eb}
.kcard.orange{background:linear-gradient(135deg,#fff7ed,#ffedd5);border-left:4px solid #ea580c}
.kcard.teal{background:linear-gradient(135deg,#f0fdfa,#ccfbf1);border-left:4px solid var(--teal)}
.kcard.purple{background:linear-gradient(135deg,#faf5ff,#ede9fe);border-left:4px solid #7c3aed}
.kcard.amber{background:linear-gradient(135deg,#fffbeb,#fef9c3);border-left:4px solid var(--amber)}
.kcard-icon{width:50px;height:50px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0;color:white}
.kcard.red .kcard-icon{background:#dc2626}.kcard.blue .kcard-icon{background:#2563eb}
.kcard.orange .kcard-icon{background:#ea580c}.kcard.teal .kcard-icon{background:var(--teal)}
.kcard.purple .kcard-icon{background:#7c3aed}.kcard.amber .kcard-icon{background:var(--amber)}
.kcard-lbl{font-size:11px;color:var(--slate);margin-bottom:2px}
.kcard-name{font-size:14px;font-weight:700;color:var(--navy);margin-bottom:2px}
.kcard-num{font-family:'Playfair Display',serif;font-size:16px;font-weight:700;color:var(--forest)}

/* ============ PENGUMUMAN ============ */
.peng-layout{display:grid;grid-template-columns:2fr 1fr;gap:28px}
.peng-list{display:flex;flex-direction:column;gap:14px}
.peng-item{
  background:white;border-radius:var(--radius-s);padding:18px 22px;
  display:flex;align-items:flex-start;gap:16px;
  box-shadow:var(--sh);transition:all 0.25s;cursor:pointer;
}
.peng-item:hover{transform:translateX(5px);box-shadow:var(--sh-lg)}
.peng-item.urgent{border-left:4px solid #dc2626}
.peng-item.info{border-left:4px solid #2563eb}
.peng-item.event{border-left:4px solid var(--forest)}
.peng-item.layanan{border-left:4px solid var(--teal)}
.peng-datebox{border-radius:10px;padding:10px 12px;text-align:center;min-width:50px;flex-shrink:0;color:white}
.peng-item.urgent .peng-datebox{background:#dc2626}
.peng-item.info .peng-datebox{background:#2563eb}
.peng-item.event .peng-datebox{background:var(--forest)}
.peng-item.layanan .peng-datebox{background:var(--teal)}
.peng-day{font-family:'Playfair Display',serif;font-size:22px;font-weight:700;line-height:1;display:block}
.peng-mon{font-size:10px;opacity:0.85;text-transform:uppercase;letter-spacing:0.5px}
.ptag{font-size:10px;font-weight:700;letter-spacing:0.8px;text-transform:uppercase;padding:2px 8px;border-radius:4px;margin-bottom:5px;display:inline-block}
.pt-urgent{background:#fee2e2;color:#dc2626}.pt-info{background:#dbeafe;color:#2563eb}
.pt-event{background:#d1fae5;color:var(--forest)}.pt-layanan{background:#ccfbf1;color:var(--teal)}
.peng-title{font-size:15px;font-weight:700;color:var(--navy);margin-bottom:4px}
.peng-text{font-size:13px;color:var(--slate);line-height:1.55}
/* Sidebar */
.peng-sidebar{display:flex;flex-direction:column;gap:18px}
.pside-card{border-radius:var(--radius);padding:22px}
.pside-card.green{background:var(--forest);color:white}
.pside-card.amber{background:var(--amber);color:var(--navy)}
.pside-card h4{font-size:15px;font-weight:700;margin-bottom:16px;display:flex;align-items:center;gap:8px}
.event-li{padding:11px 0;border-bottom:1px solid rgba(255,255,255,0.1);display:flex;align-items:center;gap:11px}
.event-li:last-child{border-bottom:none}
.el-dot{width:10px;height:10px;border-radius:50%;flex-shrink:0}
.el-name{font-size:13px;font-weight:600}
.el-date{font-size:11px;opacity:0.65}

/* ============ EVENT KALENDER ============ */
.event-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}
.evcard{
  background:white;border-radius:var(--radius);overflow:hidden;
  box-shadow:var(--sh);transition:all 0.3s;cursor:pointer;
  display:flex;flex-direction:column;
}
.evcard:hover{transform:translateY(-6px);box-shadow:var(--sh-lg)}
.evcard-top{padding:22px;color:white;position:relative;overflow:hidden;min-height:100px}
.evcard-top::before{content:'';position:absolute;top:-20px;right:-20px;width:80px;height:80px;border-radius:50%;background:rgba(255,255,255,0.1)}
.evt-forest{background:linear-gradient(135deg,var(--forest),var(--forest-m))}
.evt-teal{background:linear-gradient(135deg,var(--teal),#00898f)}
.evt-amber{background:linear-gradient(135deg,#a0722a,var(--amber))}
.evt-terracot{background:linear-gradient(135deg,#8b3515,var(--terracot))}
.evt-navy{background:linear-gradient(135deg,#0f1a30,var(--navy))}
.evt-slate{background:linear-gradient(135deg,#374a5a,var(--slate))}
.evcard-date{font-family:'Playfair Display',serif;font-size:32px;font-weight:700;line-height:1;margin-bottom:4px}
.evcard-month{font-size:13px;font-weight:600;opacity:0.8;letter-spacing:0.5px}
.evcard-icon{position:absolute;top:16px;right:18px;font-size:32px;opacity:0.25}
.evcard-body{padding:18px;flex:1}
.evcard-title{font-size:15px;font-weight:700;color:var(--navy);margin-bottom:6px}
.evcard-loc{font-size:12px;color:var(--slate);display:flex;align-items:center;gap:5px;margin-bottom:10px}
.evcard-desc{font-size:13px;color:var(--slate);line-height:1.6}

/* ============ PETA ============ */
#mapEl{height:450px;border-radius:var(--radius);overflow:hidden;box-shadow:var(--sh-lg)}

/* ============ FOOTER ============ */
footer{background:#0d1f12;padding:64px 0 0}
.footer-grid{display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:48px;margin-bottom:48px}
.fg-brand{}
.fg-logo{display:flex;align-items:center;gap:12px;margin-bottom:16px}
.fg-logo-icon{width:44px;height:44px;background:var(--forest);border-radius:11px;display:flex;align-items:center;justify-content:center;font-size:18px;color:white;font-weight:900;font-family:'Playfair Display',serif;border:2px solid var(--amber)}
.fg-logo-txt .lt1{font-family:'Playfair Display',serif;font-size:17px;font-weight:700;color:white;display:block}
.fg-logo-txt .lt2{font-size:11px;color:var(--amber);font-weight:500}
.fg-desc{font-size:13px;color:rgba(255,255,255,0.45);line-height:1.75;margin-bottom:18px}
.fg-socials{display:flex;gap:9px}
.fsc{width:34px;height:34px;border-radius:9px;background:rgba(255,255,255,0.06);color:rgba(255,255,255,0.55);display:flex;align-items:center;justify-content:center;text-decoration:none;font-size:14px;transition:all 0.2s}
.fsc:hover{background:var(--forest);color:white}
.fg-col h5{font-size:12px;font-weight:700;letter-spacing:0.8px;text-transform:uppercase;color:var(--amber);margin-bottom:18px}
.fg-links{list-style:none;display:flex;flex-direction:column;gap:9px}
.fg-links a{color:rgba(255,255,255,0.45);text-decoration:none;font-size:13px;transition:all 0.2s;display:flex;align-items:center;gap:6px}
.fg-links a i{font-size:10px;color:var(--forest-l)}
.fg-links a:hover{color:var(--amber-l);padding-left:4px}
.fg-contacts{list-style:none;display:flex;flex-direction:column;gap:10px}
.fg-contacts li{display:flex;align-items:flex-start;gap:9px;font-size:13px;color:rgba(255,255,255,0.45)}
.fg-contacts li i{color:var(--amber-l);margin-top:2px;flex-shrink:0}
.footer-bottom{border-top:1px solid rgba(255,255,255,0.05);padding:18px 28px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px}
.footer-bottom p{font-size:12px;color:rgba(255,255,255,0.3)}
.fb-links{display:flex;gap:14px}
.fb-links a{font-size:12px;color:rgba(255,255,255,0.3);text-decoration:none;transition:color 0.2s}
.fb-links a:hover{color:var(--amber-l)}

/* ============ FLOATING BUTTONS ============ */

/* ── WhatsApp ── */
.float-wa{
  position:fixed;bottom:24px;right:24px;z-index:970;
  width:52px;height:52px;border-radius:50%;background:#25D366;color:white;
  display:flex;align-items:center;justify-content:center;font-size:24px;
  text-decoration:none;box-shadow:0 4px 22px rgba(37,211,102,0.5);
  animation:waPulse 2.5s infinite;transition:transform 0.3s;
}
.float-wa:hover{transform:scale(1.12)}
@keyframes waPulse{0%,100%{box-shadow:0 4px 20px rgba(37,211,102,0.45)}50%{box-shadow:0 4px 34px rgba(37,211,102,0.75)}}
.wa-tip{position:absolute;right:62px;background:white;color:#25D366;font-size:12px;font-weight:700;padding:6px 13px;border-radius:100px;box-shadow:var(--sh);white-space:nowrap;opacity:0;transform:translateX(8px);transition:all 0.3s;pointer-events:none}
.float-wa:hover .wa-tip{opacity:1;transform:translateX(0)}

/* ── Kunjungan Hari Ini — kiri bawah pill ── */
.visit-pill{
  position:fixed;bottom:24px;left:24px;z-index:980;
  background:rgba(255,255,255,0.97);backdrop-filter:blur(12px);
  border-radius:50px;padding:10px 18px;
  box-shadow:0 4px 24px rgba(0,0,0,0.15);
  display:flex;align-items:center;gap:10px;
  animation:slideInLeft 0.7s cubic-bezier(0.34,1.56,0.64,1) 2s both;
  border:1px solid rgba(255,255,255,0.6);
}
@keyframes slideInLeft{from{transform:translateX(-140%);opacity:0}to{transform:translateX(0);opacity:1}}
.vp-icon{color:var(--forest);font-size:17px}
.vp-label{font-size:13px;font-weight:600;color:var(--navy)}
.vp-badge{
  background:linear-gradient(135deg,var(--forest),var(--forest-m));
  color:white;border-radius:30px;padding:4px 13px;
  font-size:13px;font-weight:700;letter-spacing:0.3px;
  min-width:52px;text-align:center;
}

/* ── Kanan tengah: ikon Hubungi & Aksesibilitas (persis screenshot) ── */
.float-right-cluster{
  position:fixed;right:20px;top:50%;transform:translateY(-50%);
  z-index:980;display:flex;flex-direction:column;gap:10px;
}
.frc-btn{
  width:48px;height:48px;border-radius:50%;
  background:rgba(255,255,255,0.97);backdrop-filter:blur(10px);
  border:none;cursor:pointer;
  display:flex;align-items:center;justify-content:center;
  font-size:20px;color:var(--navy);
  box-shadow:0 4px 20px rgba(0,0,0,0.18);
  transition:all 0.25s;position:relative;
}
.frc-btn:hover{background:var(--forest);color:white;transform:scale(1.1)}
.frc-btn.ak:hover{background:var(--teal);color:white}
/* tooltip ke kiri */
.frc-tip{
  position:absolute;right:58px;
  background:rgba(26,39,68,0.9);backdrop-filter:blur(6px);
  color:white;font-size:12px;font-weight:600;
  padding:6px 13px;border-radius:8px;white-space:nowrap;
  opacity:0;visibility:hidden;transform:translateX(8px);
  transition:all 0.25s;pointer-events:none;
}
.frc-tip::after{
  content:'';position:absolute;right:-5px;top:50%;transform:translateY(-50%);
  border:5px solid transparent;border-left-color:rgba(26,39,68,0.9);
}
.frc-btn:hover .frc-tip{opacity:1;visibility:visible;transform:translateX(0)}

/* ── Pop-out panels (kanan) ── */
.frc-panel{
  position:fixed;right:78px;top:50%;
  transform:translateY(-50%) translateX(16px);
  background:white;border-radius:var(--radius);box-shadow:var(--sh-lg);
  padding:20px;width:268px;z-index:979;
  opacity:0;visibility:hidden;
  transition:all 0.3s cubic-bezier(0.34,1.56,0.64,1);
}
.frc-panel.hub-panel{border-top:3px solid var(--forest)}
.frc-panel.ak-panel{border-top:3px solid var(--teal)}
.frc-panel.show{opacity:1;visibility:visible;transform:translateY(-50%) translateX(0)}
.frc-panel h4{font-size:14px;font-weight:700;color:var(--navy);margin-bottom:14px;display:flex;align-items:center;gap:8px}
.frc-panel.hub-panel h4 i{color:var(--forest)}
.frc-panel.ak-panel h4 i{color:var(--teal)}
.panel-li{display:flex;align-items:center;gap:10px;padding:9px 0;border-bottom:1px solid var(--sand);text-decoration:none;color:var(--slate);font-size:13px;transition:all 0.2s}
.panel-li:last-child{border-bottom:none}
.panel-li i{color:var(--forest);width:18px;font-size:13px}
.panel-li:hover{color:var(--forest);padding-left:4px}
.akbtn{display:flex;align-items:center;gap:8px;width:100%;padding:9px 12px;border-radius:9px;background:var(--smoke);border:1.5px solid var(--sand-d);cursor:pointer;font-size:13px;font-weight:600;color:var(--navy);margin-bottom:8px;transition:all 0.2s;font-family:inherit}
.akbtn i{width:18px;color:var(--teal);font-size:13px}
.akbtn:hover{background:var(--teal);color:white;border-color:var(--teal)}.akbtn:hover i{color:white}
.font-ctrl{display:flex;align-items:center;gap:7px;margin-bottom:12px;padding:8px 0;border-bottom:1px solid var(--sand)}
.font-ctrl span{font-size:12px;color:var(--slate);flex:1;font-weight:500}
.fcsz-btn{width:30px;height:30px;border-radius:7px;border:1.5px solid var(--sand-d);background:white;cursor:pointer;font-weight:700;font-size:12px;transition:all 0.2s}
.fcsz-btn:hover{border-color:var(--teal);color:var(--teal)}

/* ============ SEARCH OVERLAY ============ */
.srch-overlay{
  position:fixed;inset:0;z-index:9000;background:rgba(10,25,15,0.85);
  backdrop-filter:blur(10px);display:flex;align-items:flex-start;justify-content:center;
  padding-top:130px;opacity:0;visibility:hidden;transition:all 0.3s;
}
.srch-overlay.show{opacity:1;visibility:visible}
.srch-box{
  background:white;border-radius:var(--radius);padding:32px;
  width:100%;max-width:600px;margin:0 24px;box-shadow:var(--sh-lg);
}
.srch-box h3{font-family:'Playfair Display',serif;font-size:22px;color:var(--navy);margin-bottom:16px}
.srch-row{display:flex;gap:10px}
.srch-input{flex:1;padding:12px 18px;border:2px solid var(--sand-d);border-radius:10px;font-size:15px;font-family:inherit;outline:none;transition:border-color 0.2s}
.srch-input:focus{border-color:var(--forest)}
.srch-go{padding:12px 20px;background:var(--forest);color:white;border:none;border-radius:10px;cursor:pointer;font-size:15px;transition:background 0.2s}
.srch-go:hover{background:var(--forest-m)}
.srch-tags{margin-top:14px;display:flex;gap:7px;flex-wrap:wrap}
.stag{background:var(--smoke);padding:5px 12px;border-radius:100px;font-size:12px;color:var(--navy);cursor:pointer;border:1.5px solid var(--sand-d);transition:all 0.2s}
.stag:hover{border-color:var(--forest);color:var(--forest)}
.srch-close{display:block;width:100%;margin-top:12px;background:var(--smoke);border:none;padding:10px;border-radius:8px;cursor:pointer;color:var(--slate);font-weight:600;font-family:inherit}

/* ============ LIGHTBOX ============ */
.lbx{position:fixed;inset:0;z-index:9100;background:rgba(0,0,0,0.93);display:flex;align-items:center;justify-content:center;opacity:0;visibility:hidden;transition:all 0.3s}
.lbx.show{opacity:1;visibility:visible}
.lbx-img{max-width:82vw;max-height:75vh;border-radius:var(--radius);overflow:hidden;display:flex;align-items:center;justify-content:center}
.lbx-img img{width:100%;height:100%;object-fit:cover}
.lbx-close{position:absolute;top:22px;right:22px;width:42px;height:42px;border-radius:50%;background:rgba(255,255,255,0.1);color:white;border:none;font-size:18px;cursor:pointer;transition:background 0.2s}
.lbx-close:hover{background:rgba(255,255,255,0.2)}

/* ============ ANIMATIONS ============ */
@keyframes fadeUp{from{opacity:0;transform:translateY(22px)}to{opacity:1;transform:translateY(0)}}
@keyframes fadeDown{from{opacity:0;transform:translateY(-22px)}to{opacity:1;transform:translateY(0)}}

/* ============ HAMBURGER MENU ============ */
.hamburger{
  display:none;flex-direction:column;gap:5px;
  background:none;border:none;cursor:pointer;padding:6px;z-index:1100;
}
.hamburger span{
  display:block;width:24px;height:2.5px;border-radius:4px;
  transition:all 0.35s cubic-bezier(0.4,0,0.2,1);
}
#navbar:not(.scrolled) .hamburger span{background:white}
#navbar.scrolled .hamburger span{background:var(--navy)}
.hamburger.open span:nth-child(1){transform:translateY(7.5px) rotate(45deg)}
.hamburger.open span:nth-child(2){opacity:0;transform:scaleX(0)}
.hamburger.open span:nth-child(3){transform:translateY(-7.5px) rotate(-45deg)}

/* Mobile Drawer */
.mobile-drawer{
  position:fixed;top:0;left:0;right:0;bottom:0;z-index:1050;
  background:rgba(26,39,68,0.5);backdrop-filter:blur(4px);
  opacity:0;visibility:hidden;transition:all 0.3s;
}
.mobile-drawer.open{opacity:1;visibility:visible}
.drawer-panel{
  position:absolute;top:0;right:0;bottom:0;width:82%;max-width:320px;
  background:white;box-shadow:-8px 0 40px rgba(0,0,0,0.2);
  transform:translateX(100%);transition:transform 0.35s cubic-bezier(0.4,0,0.2,1);
  overflow-y:auto;display:flex;flex-direction:column;
}
.mobile-drawer.open .drawer-panel{transform:translateX(0)}
.drawer-head{
  background:linear-gradient(135deg,var(--forest),var(--teal));
  padding:28px 20px 22px;display:flex;align-items:center;gap:12px;
}
.drawer-head-icon{
  width:44px;height:44px;border-radius:11px;
  background:rgba(255,255,255,0.15);border:2px solid var(--amber);
  display:flex;align-items:center;justify-content:center;
  font-size:18px;color:white;font-weight:900;font-family:'Playfair Display',serif;flex-shrink:0;
}
.drawer-head h4{color:white;font-size:15px;font-weight:700;margin:0;font-family:'Playfair Display',serif}
.drawer-head p{color:rgba(255,255,255,0.65);font-size:11px;margin:0}
.drawer-close{
  position:absolute;top:16px;right:16px;width:32px;height:32px;
  background:rgba(255,255,255,0.15);border:none;border-radius:50%;
  color:white;font-size:16px;cursor:pointer;display:flex;align-items:center;justify-content:center;
}
.drawer-nav{padding:12px 0;flex:1}
.drawer-nav a,.drawer-nav-btn{
  display:flex;align-items:center;gap:12px;
  padding:13px 20px;font-size:14px;font-weight:600;color:var(--navy);
  text-decoration:none;transition:all 0.2s;border:none;background:none;
  width:100%;text-align:left;cursor:pointer;font-family:inherit;
}
.drawer-nav a:hover,.drawer-nav-btn:hover{background:var(--sand);color:var(--forest);padding-left:26px}
.drawer-nav a i,.drawer-nav-btn i{width:20px;color:var(--forest);font-size:14px;flex-shrink:0}
.drawer-divider{height:1px;background:var(--sand-d);margin:6px 16px}
.drawer-section{padding:6px 20px 4px;font-size:10px;font-weight:800;color:var(--slate);letter-spacing:1.5px;text-transform:uppercase}
.drawer-footer{
  padding:16px 20px;background:var(--sand);
  display:flex;gap:8px;
}
.drawer-footer a{
  flex:1;display:flex;align-items:center;justify-content:center;gap:6px;
  padding:10px;border-radius:10px;font-size:13px;font-weight:700;text-decoration:none;
}
.drawer-wa{background:#25D366;color:white}
.drawer-phone{background:var(--forest);color:white}

/* ============ RESPONSIVE — TABLET (max 1024px) ============ */
@media(max-width:1024px){
  .container{padding:0 20px}
  .section{padding:64px 0}
  .berita-featured{grid-template-columns:1fr}
  .berita-side{display:grid;grid-template-columns:1fr 1fr;gap:14px}
  .berita-grid-sm{grid-template-columns:1fr 1fr}
  .wisata-grid{grid-template-columns:1fr 1fr}
  .layanan-grid{grid-template-columns:1fr 1fr}
  .kontak-grid{grid-template-columns:1fr 1fr}
  .footer-grid{grid-template-columns:1fr 1fr;gap:32px}
  .infografis-grid{grid-template-columns:1fr 1fr}
  .charts-grid{grid-template-columns:1fr 1fr}
  .galeri-masonry{grid-template-columns:repeat(3,1fr)}
  .event-grid{grid-template-columns:1fr 1fr}
  .peng-layout{grid-template-columns:1fr}
  .profil-grid{grid-template-columns:1fr;gap:40px}
  .profil-main-img{height:300px}
  .profil-float1{bottom:-10px;right:-10px}
  .profil-float2{top:-10px;left:-10px}
  .bagan-line-group{flex-wrap:wrap;gap:12px}
}

/* ============ RESPONSIVE — MOBILE (max 768px) ============ */
@media(max-width:768px){
  /* Hide desktop nav, show hamburger */
  .nav-menu,.nav-actions{display:none}
  .hamburger{display:flex}

  /* Navbar adjustments */
  #navbar{top:32px}
  .nav-inner{padding:10px 16px}

  /* Marquee smaller on mobile */
  .marquee-bar{padding:5px 0}
  .marquee-badge{font-size:9px;padding:3px 10px}
  .marquee-track span{font-size:11px}

  /* Section spacing */
  .section{padding:52px 0}
  .container{padding:0 16px}
  .sec-head{margin-bottom:36px}
  .sec-title{font-size:clamp(22px,6vw,32px)}

  /* Hero */
  .hero-title{font-size:clamp(38px,10vw,58px)}
  .hero-sub{font-size:14px;margin-bottom:24px}
  .hero-ctas{gap:10px}
  .cta-primary,.cta-ghost{padding:12px 22px;font-size:13px}
  .hero-prev{left:12px}.hero-next{right:12px}
  .hero-prev,.hero-next{width:38px;height:38px;font-size:14px}
  .scroll-hint{display:none}

  /* Quick strip — 2 kolom */
  .qstrip{grid-template-columns:1fr 1fr}
  .qitem{padding:14px 14px;gap:10px}
  .qi-icon{width:36px;height:36px;font-size:16px}
  .qi-text .l2{font-size:12px}

  /* Profil */
  .profil-grid{grid-template-columns:1fr;gap:24px}
  .profil-main-img{height:240px;border-radius:16px}
  .profil-float1{bottom:-12px;right:12px;padding:12px 16px}
  .profil-float1 .pf-num{font-size:22px}
  .profil-float2{top:-12px;left:12px;padding:10px 14px}
  .profil-float2 i{font-size:16px}
  .profil-float2 .pf2-val{font-size:15px}
  .profil-text h2{font-size:26px}
  .profil-facts{grid-template-columns:1fr 1fr;gap:8px}

  /* Info desa tabs — scroll horizontal */
  .info-tabs-wrap{overflow-x:auto;padding:5px;gap:4px;-webkit-overflow-scrolling:touch}
  .info-tabs-wrap::-webkit-scrollbar{height:0}
  .itab{padding:8px 14px;font-size:12px;white-space:nowrap}
  .bagan-wrap{padding:10px 0}
  .bagan-line-group{flex-wrap:wrap;gap:10px;justify-content:center}
  .bagan-box{min-width:130px;padding:10px 14px}
  .bb-name{font-size:12px}

  /* Infografis */
  .infografis-grid{grid-template-columns:1fr 1fr;gap:12px}
  .ig-card{padding:18px 14px}
  .ig-num{font-size:30px}
  .ig-icon{width:44px;height:44px;font-size:18px}
  .charts-grid{grid-template-columns:1fr}

  /* Berita */
  .berita-featured{grid-template-columns:1fr}
  .bf-img{height:210px}
  .bf-title{font-size:16px}
  .berita-side{display:flex;flex-direction:column;gap:10px}
  .bside-img{width:80px}
  .bside-title{font-size:12px}
  .berita-grid-sm{grid-template-columns:1fr;gap:14px}
  .bg-sm-img{height:140px}

  /* Potensi wisata */
  .wisata-grid{grid-template-columns:1fr;gap:16px}
  .wisata-filter{gap:6px}
  .wfbtn{padding:7px 14px;font-size:12px}
  .wcard-img{height:200px}

  /* Galeri */
  .galeri-masonry{
    grid-template-columns:1fr 1fr;
    grid-auto-rows:140px;
    gap:8px;
  }
  .gitem.w2{grid-column:span 2}
  .gitem.h2{grid-row:span 2}
  .galeri-filter-row{gap:6px}
  .gfbtn{padding:7px 14px;font-size:12px}

  /* Pengumuman */
  .peng-layout{grid-template-columns:1fr}
  .peng-item{padding:14px 16px;gap:12px}
  .peng-datebox{padding:8px 10px;min-width:44px}
  .peng-day{font-size:18px}
  .peng-title{font-size:14px}
  .peng-text{font-size:12px}
  .peng-sidebar{display:none} /* hide sidebar on mobile */

  /* Event */
  .event-grid{grid-template-columns:1fr;gap:14px}
  .evcard-top{padding:16px}
  .evcard-date{font-size:26px}

  /* Layanan */
  .layanan-grid{grid-template-columns:1fr 1fr;gap:12px}
  .lcard{padding:20px 14px}
  .lcard-icon{width:52px;height:52px;font-size:22px}
  .lcard-title{font-size:13px}
  .lcard-desc{font-size:11px}

  /* Kontak */
  .kontak-grid{grid-template-columns:1fr;gap:10px}
  .kcard{padding:16px}
  .kcard-icon{width:42px;height:42px;font-size:17px}

  /* Peta */
  #mapEl{height:320px;border-radius:12px}

  /* Footer */
  .footer-grid{grid-template-columns:1fr;gap:28px}
  footer{padding:44px 0 0}
  .fg-desc{font-size:12px}
  .footer-bottom{flex-direction:column;text-align:center;gap:6px;padding:16px}
  .fb-links{justify-content:center}

  /* Floating */
  .visit-pill{display:none}
  .float-right-cluster{display:none}
  .frc-panel{display:none}
  .float-wa{bottom:16px;right:16px;width:48px;height:48px;font-size:22px}
  .wa-tip{display:none}

  /* Search overlay */
  .srch-overlay{padding-top:80px}
  .srch-box{padding:20px;margin:0 12px}
  .srch-box h3{font-size:17px}
  .srch-row{flex-direction:column}
  .srch-go{padding:12px}

  /* Section pill smaller */
  .spill,.sec-pill{font-size:10px;padding:4px 12px}

  /* Btn font size */
  .btn-green,.btn-amber,.btn-outline{padding:11px 22px;font-size:13px}
}

/* ============ RESPONSIVE — SMALL MOBILE (max 420px) ============ */
@media(max-width:420px){
  .hero-title{font-size:36px}
  .hero-badge{font-size:10px;padding:5px 12px}
  .qstrip{grid-template-columns:1fr}
  .qitem:nth-child(n+3){display:none} /* show only 2 on tiny screens, hide last 2 */
  .profil-facts{grid-template-columns:1fr}
  .infografis-grid{grid-template-columns:1fr 1fr;gap:8px}
  .layanan-grid{grid-template-columns:1fr}
  .galeri-masonry{grid-template-columns:1fr;grid-auto-rows:180px}
  .gitem.w2{grid-column:span 1}
  .kontak-grid{grid-template-columns:1fr}
  .profil-main-img{height:210px}
  .sec-title{font-size:22px}
}

/* ============ MOBILE INLINE STYLE OVERRIDES ============ */
@media(max-width:768px){
  /* Fix profil heading inline style */
  #profil h2[style]{font-size:clamp(22px,6vw,30px) !important;line-height:1.3 !important}
  /* Fix infografis section padding */
  .section.section-teal .container{padding:0 16px}
  /* Fix peng-sidebar visibility - already hidden, add kotak saran accessible */
  .pside-card.amber textarea{font-size:13px}
  /* ensure no horizontal overflow */
  .bagan-wrap{overflow-x:auto;-webkit-overflow-scrolling:touch}
  /* Fix visit-pill absolute in hero (first one) - hide on mobile */
  #hero .visit-pill{display:none !important}
  /* Fix profil float badges overflow */
  .profil-img-wrap{padding:16px}
  .profil-float1{right:0;bottom:-8px}
  .profil-float2{left:0;top:-8px}
  /* event section */
  .evcard-desc{-webkit-line-clamp:2}
  /* footer bottom links wrap */
  .fb-links{flex-wrap:wrap;gap:10px}
  /* fix layanan grid gap on very small */
  .lcard-link{display:none}
}

#mapEl{height:480px;border-radius:16px;overflow:hidden;box-shadow:0 12px 48px rgba(0,0,0,.14)}

/* ======= EXTRA: btn-admin-nav ======= */
.btn-admin-nav{
  display:inline-flex;align-items:center;gap:6px;
  padding:8px 16px;border-radius:8px;
  background:var(--forest);color:white;
  font-size:12px;font-weight:700;text-decoration:none;
  transition:all 0.2s;
}
.btn-admin-nav:hover{background:var(--forest-m);}

/* vp-badge alias for vp-num */
.vp-badge{
  background:var(--forest);color:white;border-radius:30px;
  padding:4px 14px;font-size:14px;font-weight:800;
  letter-spacing:0.5px;min-width:52px;text-align:center;
}

/* ======= EXTRA: ev-card (for event list page) ======= */
.ev-card{
  background:rgba(255,255,255,0.06);
  border:1px solid rgba(255,255,255,0.1);
  border-radius:var(--radius);overflow:hidden;transition:all 0.3s;
}
.ev-card:hover{transform:translateY(-5px);background:rgba(255,255,255,0.1)}
.ev-img{height:160px;overflow:hidden;background:#1a2a1a}
.ev-img img{width:100%;height:100%;object-fit:cover}
.ev-body{padding:16px}
.ev-date{font-size:11px;color:var(--amber-l);margin-bottom:6px;display:flex;align-items:center;gap:5px}
.ev-name{font-family:'Playfair Display',serif;font-size:16px;font-weight:700;color:white;margin-bottom:6px}
.ev-loc{font-size:12px;color:rgba(255,255,255,0.55);display:flex;align-items:center;gap:5px}
</style>
@yield('extra-head')
</head>
<body>
@yield('body')
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
<script>


// ===== SIMPLE SCROLL ANIMATIONS (no AOS dependency) =====
function initScrollAnim(){
  const els = document.querySelectorAll('[data-aos]');
  els.forEach(el=>{
    el.style.opacity='0';
    el.style.transform='translateY(28px)';
    el.style.transition='opacity 0.65s ease, transform 0.65s ease';
  });
  const obs = new IntersectionObserver(entries=>{
    entries.forEach(e=>{
      if(e.isIntersecting){
        const delay = e.target.dataset.aosDelay || 0;
        setTimeout(()=>{
          e.target.style.opacity='1';
          e.target.style.transform='translateY(0)';
        }, parseInt(delay));
        obs.unobserve(e.target);
      }
    });
  },{threshold:0.12});
  els.forEach(el=>obs.observe(el));
}
document.addEventListener('DOMContentLoaded', initScrollAnim);


// ===== SPA PAGE ROUTER =====
(function() {
  var ALL_PAGES = [
    'page-beranda','page-profil-desa','page-struktur-pemerintahan',
    'page-infografis-desa','page-berita-desa','page-potensi-wisata',
    'page-galeri-desa','page-pengumuman-desa','page-layanan-desa',
    'page-event-desa','page-kontak-desa','page-peta-desa'
  ];

  var HASH_TO_PAGE = {
    '':'page-beranda','beranda':'page-beranda',
    'profil-desa':'page-profil-desa',
    'struktur-pemerintahan':'page-struktur-pemerintahan',
    'infografis-desa':'page-infografis-desa',
    'berita-desa':'page-berita-desa',
    'potensi-wisata':'page-potensi-wisata',
    'galeri-desa':'page-galeri-desa',
    'pengumuman-desa':'page-pengumuman-desa',
    'layanan-desa':'page-layanan-desa',
    'event-desa':'page-event-desa',
    'kontak-desa':'page-kontak-desa',
    'peta-desa':'page-peta-desa'
  };

  var mapDone = false;

  function showPage(hash) {
    var h = (hash||'').replace('#','');
    var pageId = HASH_TO_PAGE[h] || 'page-beranda';

    ALL_PAGES.forEach(function(id){
      var el = document.getElementById(id);
      if(el) el.style.display = 'none';
    });

    var tgt = document.getElementById(pageId);
    if(tgt){ tgt.style.display = 'block'; window.scrollTo(0,0); }

    document.querySelectorAll('.nav-menu a, .drawer-nav a').forEach(function(a){
      a.classList.remove('nav-active');
      var ah = (a.getAttribute('href')||'').replace('#','');
      if(HASH_TO_PAGE[ah] === pageId) a.classList.add('nav-active');
    });

    setTimeout(initScrollAnim, 60);

    if(pageId === 'page-peta-desa'){
      setTimeout(function(){
        var el = document.getElementById('mapEl');
        if(!el) return;
        if(mapDone){
          if(window._leafMap) window._leafMap.invalidateSize();
          return;
        }
        mapDone = true;
        try{
          var m = L.map('mapEl').setView([2.333,99.067],13); window._leafMap = m;
          window._leafMap = m;
          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{attribution:'© OpenStreetMap',maxZoom:18}).addTo(m);
          function mk(s){ return L.divIcon({html:s,iconSize:[36,36],iconAnchor:[18,18],className:''}); }
          var lat = parseFloat(el.dataset.lat||'2.333');
          var lng = parseFloat(el.dataset.lng||'99.067');
          var namaD = el.dataset.nama||'Kantor Desa Meat';
          var alamatD = el.dataset.alamat||'Kec. Balige, Kab. Toba';
          m.setView([lat,lng],13);
          L.marker([lat,lng],{icon:mk('<div style="background:#1B5E2F;color:#fff;border-radius:50%;width:36px;height:36px;display:flex;align-items:center;justify-content:center;font-size:18px;box-shadow:0 2px 10px rgba(0,0,0,.3);border:2px solid #fff">&#127960;&#65039;</div>')}).addTo(m).bindPopup('<strong>'+namaD+'</strong><br>'+alamatD).openPopup();
          L.marker([2.340,99.060],{icon:mk('<div style="background:#2563eb;color:#fff;border-radius:50%;width:32px;height:32px;display:flex;align-items:center;justify-content:center;font-size:15px;box-shadow:0 2px 8px rgba(0,0,0,.3);border:2px solid #fff">&#127754;</div>')}).addTo(m).bindPopup('<strong>Pantai Meat</strong><br>Tepi Danau Toba');
          L.marker([2.328,99.072],{icon:mk('<div style="background:#C8963E;color:#fff;border-radius:50%;width:30px;height:30px;display:flex;align-items:center;justify-content:center;font-size:14px;box-shadow:0 2px 8px rgba(0,0,0,.3);border:2px solid #fff">&#9968;&#65039;</div>')}).addTo(m).bindPopup('<strong>Bukit Panorama</strong>');
          L.marker([2.320,99.065],{icon:mk('<div style="background:#dc2626;color:#fff;border-radius:50%;width:28px;height:28px;display:flex;align-items:center;justify-content:center;font-size:13px;box-shadow:0 2px 8px rgba(0,0,0,.3);border:2px solid #fff">&#127973;</div>')}).addTo(m).bindPopup('<strong>Puskesmas Balige</strong>');
          setTimeout(function(){ m.invalidateSize(); },300);
        }catch(err){
          var el2=document.getElementById('mapEl');
          if(el2) el2.innerHTML='<div style="height:100%;background:linear-gradient(135deg,#1B5E2F,#006D77);display:flex;flex-direction:column;align-items:center;justify-content:center;color:#fff;gap:12px"><span style="font-size:52px">&#128506;&#65039;</span><span style="font-size:18px;font-weight:700">Peta Desa Meat</span><span style="opacity:.7;font-size:13px">Kec. Balige &middot; 2.333&deg;N, 99.067&deg;E</span></div>';
        }
      },250);
    }

    if(pageId === 'page-infografis-desa'){
      setTimeout(function(){
        [{id:'ig1',v:2856},{id:'ig2',v:1445},{id:'ig3',v:1411},{id:'ig4',v:712}].forEach(function(x){
          animateNum(document.getElementById(x.id),x.v);
        });
        document.querySelectorAll('.bar-fill[data-w]').forEach(function(b){
          b.style.width='0';
          setTimeout(function(){ b.style.width=b.dataset.w; },300);
        });
      },200);
    }
  }

  window.addEventListener('hashchange',function(){ showPage(location.hash); });
  document.addEventListener('DOMContentLoaded',function(){ showPage(location.hash||'#beranda'); });
})();

// ===== NAVBAR =====
window.addEventListener('scroll', () => {
  const nb = document.getElementById('navbar');
  if(window.scrollY > 60) nb.classList.add('scrolled');
  else nb.classList.remove('scrolled');
});

// ===== HERO SLIDER =====
let hIdx = 0;
const hSlides = document.querySelectorAll('.hero-slide');
const hDots = document.querySelectorAll('.hdot');
function gotoSlide(n){
  hSlides[hIdx].classList.remove('active'); hDots[hIdx].classList.remove('on');
  hIdx = (n + hSlides.length) % hSlides.length;
  hSlides[hIdx].classList.add('active'); hDots[hIdx].classList.add('on');
}
function heroSlide(dir){ gotoSlide(hIdx + dir); }
setInterval(() => gotoSlide(hIdx + 1), 5500);

// ===== VISIT COUNTER =====
function animateNum(el, target, dur=1800){
  if(!el) return;
  let n=0, step=Math.ceil(target/(dur/16));
  const t=setInterval(()=>{
    n=Math.min(n+step,target);
    el.textContent=n.toLocaleString('id-ID');
    if(n>=target) clearInterval(t);
  },16);
}
let vCount = parseInt(localStorage.getItem('meat_v')||'0') + 1;
localStorage.setItem('meat_v', vCount);
setTimeout(()=>{ const el=document.getElementById('vpNum'); animateNum(el, 1200 + vCount, 1600); }, 2200);

// ===== INFOGRAFIS COUNTERS =====
const igVals = [{id:'ig1',v:2856},{id:'ig2',v:1445},{id:'ig3',v:1411},{id:'ig4',v:712}];
let igDone = false;
const igObs = new IntersectionObserver(entries=>{
  if(entries[0].isIntersecting && !igDone){
    igDone=true;
    igVals.forEach(x=>animateNum(document.getElementById(x.id),x.v));
    document.querySelectorAll('.bar-fill[data-w]').forEach(b=>{
      setTimeout(()=>b.style.width=b.dataset.w,300);
    });
  }
},{threshold:0.2});
document.querySelector('.infografis-grid') && igObs.observe(document.querySelector('.infografis-grid'));

// ===== INFO DESA TABS =====
function switchITab(id, btn){
  document.querySelectorAll('.itp').forEach(t=>t.classList.remove('on'));
  document.querySelectorAll('.itab').forEach(b=>b.classList.remove('on'));
  document.getElementById('itp-'+id).classList.add('on');
  btn.classList.add('on');
}

// ===== WISATA FILTER =====
function filterWisata(cat, btn){
  document.querySelectorAll('.wfbtn').forEach(b=>b.classList.remove('on'));
  btn.classList.add('on');
  document.querySelectorAll('#wisataGrid .wcard').forEach(c=>{
    const show = cat==='all' || c.dataset.cat===cat;
    c.style.display = show ? '' : 'none';
  });
}

// ===== GALERI FILTER =====
function filterGaleri(cat, btn){
  document.querySelectorAll('.gfbtn').forEach(b=>b.classList.remove('on'));
  btn.classList.add('on');
  document.querySelectorAll('#galeriMasonry .gitem').forEach(c=>{
    const show = cat==='all' || c.dataset.gcat===cat;
    c.style.display = show ? '' : 'none';
  });
}

// ===== LIGHTBOX =====
function openLbx(el, title, imgUrl){
  document.getElementById('lbxImgSrc').src = imgUrl || el.querySelector('img').src;
  document.getElementById('lbxEl').classList.add('show');
}
function closeLbx(){ document.getElementById('lbxEl').classList.remove('show'); }

// ===== SEARCH =====
function openSearch(){ document.getElementById('srchOvl').classList.add('show'); setTimeout(()=>document.getElementById('srchIn').focus(),100); }
function closeSearch(e){ if(!e||e.target===document.getElementById('srchOvl')) document.getElementById('srchOvl').classList.remove('show'); }
function srchTag(t){ document.getElementById('srchIn').value=t; }
// keydown handled in drawer JS below

// ===== FLOATING PANELS (right-side round icons) =====
function toggleFrcPanel(id){
  const h=document.getElementById('frcPanelHub'), a=document.getElementById('frcPanelAk');
  if(!h||!a) return;
  if(id==='hub'){ const was=h.classList.contains('show'); h.classList.remove('show'); a.classList.remove('show'); if(!was) h.classList.add('show'); }
  else { const was=a.classList.contains('show'); h.classList.remove('show'); a.classList.remove('show'); if(!was) a.classList.add('show'); }
}
document.addEventListener('click',e=>{
  if(!e.target.closest('.float-right-cluster') && !e.target.closest('.frc-panel')) {
    document.getElementById('frcPanelHub') && document.getElementById('frcPanelHub').classList.remove('show');
    document.getElementById('frcPanelAk') && document.getElementById('frcPanelAk').classList.remove('show');
  }
});

// ===== ACCESSIBILITY =====
let fs=100;
function fntSz(d){ if(d===0){fs=100;}else{fs=Math.max(80,Math.min(130,fs+d*10));} document.body.style.fontSize=fs+'%'; }
function toggleHighContrast(){ document.body.classList.toggle('hc'); }
function toggleGrayscale(){ document.body.style.filter=document.body.style.filter?'':'grayscale(100%)'; }
function toggleDyslexia(){ document.body.style.fontFamily=document.body.style.fontFamily?'':'"Comic Sans MS",cursive'; }
function resetA11y(){ document.body.style.fontSize='';document.body.style.filter='';document.body.style.fontFamily='';document.body.classList.remove('hc'); fs=100; }

// ===== LANG =====
function setLang(l){
  document.getElementById('btnId').classList.toggle('active',l==='id');
  document.getElementById('btnEn').classList.toggle('active',l==='en');
}

// ===== MAP (handled by SPA router) =====
// ===== MOBILE DRAWER =====
function toggleDrawer(){
  const drawer = document.getElementById('mobileDrawer');
  const btn = document.getElementById('hamburgerBtn');
  const isOpen = drawer.classList.contains('open');
  drawer.classList.toggle('open');
  btn.classList.toggle('open');
  document.body.style.overflow = isOpen ? '' : 'hidden';
}
function closeDrawerIfOverlay(e){
  if(e.target === document.getElementById('mobileDrawer')) toggleDrawer();
}
document.addEventListener('keydown', e => {
  if(e.key === 'Escape') {
    const drawer = document.getElementById('mobileDrawer');
    if(drawer.classList.contains('open')) toggleDrawer();
    document.getElementById('srchOvl').classList.remove('show');
    document.getElementById('lbxEl').classList.remove('show');
  }
});

</script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
@yield('extra-scripts')
</body>
</html>
L