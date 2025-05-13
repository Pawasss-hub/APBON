<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran Kita</title>
    <style>
        /* Base Styles */
        :root {
            --primary: #f59e0b;
            --primary-dark: #d97706;
            --accent: #ef4444;
            --dark: #1f2937;
            --light: #f9fafb;
            --gray: #6b7280;
            --border: #e5e7eb;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', 'Segoe UI', Tahoma, sans-serif;
            color: var(--dark);
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80') center/cover no-repeat;
            color: white;
            position: relative;
        }
        
        /* Navigation */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 5%;
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: 1px;
        }
        
        .logo span {
            color: var(--primary);
        }
        
        .nav-links {
            display: flex;
            list-style: none;
        }
        
        .nav-links li {
            margin-left: 2rem;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .nav-links a:hover {
            color: var(--primary);
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary);
            transition: width 0.3s ease;
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        .btn-logout {
            background-color: var(--accent);
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        
        .btn-logout:hover {
            background-color: #dc2626;
            color: white;
        }
        
        .btn-logout::after {
            display: none;
        }
        
        /* Hero Content */
        .hero-content {
            position: absolute;
            top: 50%;
            left: 5%;
            transform: translateY(-50%);
            max-width: 650px;
        }
        
        .hero-subtitle {
            color: var(--primary);
            font-size: 1.2rem;
            margin-bottom: 1rem;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        
        .hero-title {
            font-size: 3.5rem;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }
        
        .hero-description {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            line-height: 1.8;
        }
        
        /* Buttons */
        .btn {
            display: inline-block;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
            border: 2px solid var(--primary);
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(245, 158, 11, 0.3);
        }
        
        .btn-outline {
            background-color: transparent;
            color: white;
            border: 2px solid white;
            margin-left: 1rem;
        }
        
        .btn-outline:hover {
            background-color: white;
            color: var(--dark);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 255, 255, 0.2);
        }
        
        /* Features */
        .features {
            display: flex;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 1.5rem 5%;
        }
        
        .feature {
            flex: 1;
            display: flex;
            align-items: center;
            padding: 1rem;
            color: white;
        }
        
        .feature-icon {
            font-size: 1.8rem;
            color: var(--primary);
            margin-right: 1rem;
        }
        
        .feature-text h3 {
            font-size: 1rem;
            margin-bottom: 0.3rem;
        }
        
        .feature-text p {
            font-size: 0.9rem;
            opacity: 0.7;
        }
        
        /* Mobile Menu Button */
        .menu-toggle {
            display: none;
            flex-direction: column;
            justify-content: space-between;
            width: 30px;
            height: 21px;
            cursor: pointer;
        }
        
        .menu-toggle span {
            height: 3px;
            width: 100%;
            background-color: white;
            border-radius: 3px;
            transition: all 0.3s ease;
        }
        
        /* Responsive Styles */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.8rem;
            }
            
            .features {
                flex-wrap: wrap;
            }
            
            .feature {
                flex: 1 0 50%;
            }
        }
        
        @media (max-width: 768px) {
            .menu-toggle {
                display: flex;
                z-index: 1000;
            }
            
            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                flex-direction: column;
                background-color: var(--dark);
                width: 80%;
                height: 100vh;
                padding: 5rem 2rem;
                transition: all 0.5s ease;
                z-index: 999;
            }
            
            .nav-links.active {
                right: 0;
            }
            
            .nav-links li {
                margin: 1.5rem 0;
            }
            
            .hero-content {
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                width: 90%;
            }
            
            .feature {
                flex: 100%;
            }
            
            .btn-outline {
                margin-left: 0;
                margin-top: 1rem;
            }
        }
    </style>
</head>
<body>
    <section class="hero">
        <nav class="navbar">
            <div class="logo">Resto<span>Kita</span></div>
            <ul class="nav-links">
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Menu</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Reservasi</a></li>
                <li><a href="#">Kontak</a></li>
                <li><a href="<?= site_url('logout') ?>" class="btn-logout">Logout</a></li>
            </ul>
            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
        
        <div class="hero-content">
            <p class="hero-subtitle">Pengalaman Kuliner Terbaik</p>
            <h1 class="hero-title">Nikmati Hidangan Lezat Dengan Suasana Yang Menenangkan</h1>
            <p class="hero-description">Kami menyajikan berbagai macam hidangan autentik dengan bahan-bahan segar dan berkualitas tinggi yang akan memuaskan selera Anda.</p>
            <div class="cta-buttons">
                <a href="<?= route_to('formLogin') ?>" class="btn btn-primary">Login Sekarang</a>
                <a href="#" class="btn btn-outline">Lihat Menu</a>
            </div>
        </div>
        
        <div class="features">
            <div class="feature">
                <div class="feature-icon">🍽️</div>
                <div class="feature-text">
                    <h3>Bahan Segar</h3>
                    <p>Selalu menggunakan bahan-bahan terbaik dan segar setiap hari</p>
                </div>
            </div>
            <div class="feature">
                <div class="feature-icon">👨‍🍳</div>
                <div class="feature-text">
                    <h3>Chef Berpengalaman</h3>
                    <p>Tim chef profesional dengan pengalaman internasional</p>
                </div>
            </div>
            <div class="feature">
                <div class="feature-icon">🚚</div>
                <div class="feature-text">
                    <h3>Pengiriman Cepat</h3>
                    <p>Layanan pengiriman tepat waktu ke lokasi Anda</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Simple mobile menu toggle
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.nav-links').classList.toggle('active');
        });
    </script>
</body>
</html>