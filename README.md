```
   /$$   /$$           /$$       /$$                 /$$                    /$$
  | $$  | $$          | $$      | $$                | $$                   | $$
  | $$  | $$  /$$$$$$ | $$   /$$| $$        /$$$$$$ | $$$$$$$     /$$$$$$$ | $$
  | $$$$$$$$ /$$__  $$| $$  /$$/| $$       |____  $$| $$__  $$   | $$__  $$| $$
  | $$__  $$| $$$$$$$$| $$$$$$/ | $$        /$$$$$$$| $$  | $$   | $$  | $$| $$
  | $$  | $$| $$_____/| $$_  $$ | $$       /$$__  $$| $$  | $$   | $$  | $$| $$
  | $$  | $$|  $$$$$$$| $$ .  $$| $$$$$$$$|  $$$$$$$| $$$$$$$//$$| $$  | $$| $$
  |__/  |__/ ._______/|__/  .__/|________/ ._______/|_______/|__/|__/  |__/|__/

  Welcome to the HekLab.nl CTF challenge!

  Your mission, should you choose to accept it, is to find all 'flags' hidden 
  on hosted systems using your knowledge/techniques of vulnerabilities and 
  other security weaknesses and report these 'flags'.

  Happy hacking,

  The HekLab.NL Team
```

## About HekLab.nl

HekLab is a 'Capture The Flag' platform for co-workers and friends, we offer challenges designed to test and improve your hacking skills.
The goal: Try to find the vulnerabilities that are in the challenges, exploit these and get the flags.

**Use it responsibly and don't hack your fellow members...**

## Infrastructure requirements

- Hardware: [Hetzner root server](https://www.hetzner.com/dedicated-rootserver) or [Hetzner server auction](https://www.hetzner.com/sb).
- Hypervisor: [Proxmox VE 6](https://www.proxmox.com/en/).
- Firewall and VPN Concentrator: [OPNsense Virtual Instance](https://opnsense.org/).
- WebServer: [NGINX Open Source](https://nginx.org/en/download.html) with [PHP-FPM 7.4+](https://www.php.net/downloads.php#v7.4.11) and [Laravel 8](https://laravel.com/).
- DatabaseServer: [MySQL](https://www.mysql.com/) or [MariaDB](https://mariadb.org/).
- RedisServer: [Redis cache and event broker](https://redis.io/).
- Real-time event broadcasting: [Pusher](https://pusher.com/).

A basic knowledge of Linux, virtualisation and webhosting is a must offcourse.

## Current Infrastructure

Hardware: [Hetzner SB49](https://www.hetzner.com/sb?search=sb49)
- CPU: Intel(R) Core(TM) i7-3930K (12 Threads @ 3.20GHz)
- RAM: 8x RAM 8192 MB DDR3 (64GB)
- SSD: 1x [SSD SATA 240 GB](https://ark.intel.com/content/www/us/en/ark/products/66250/intel-ssd-520-series-240gb-2-5in-sata-6gb-s-25nm-mlc.html)
- HDD: 2x [HDD SATA 3,0 TB Enterprise](https://tweakers.net/pricewatch/320865/wd-re-wd3000fyyz-3tb/specificaties/)
- Backup: [Hetzner BX10 Backup Storage (100GB)](https://www.hetzner.com/storage/storage-box)

- - -
- - -

## Contributing

Thank you for considering contributing to the HekLab initiative! The contribution guide can be found in the [documentation](https://heklab.nl/docs/contributions).

## Code of Conduct

In order to ensure that the HekLab initiative is welcome to all accepted contributors, please review and abide by the [Code of Conduct](https://heklab.nl/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within the HekLab framework, please send an e-mail to Ronny Roethof via [ronny@heklab.nl](mailto:ronny@heklab.nl). All security vulnerabilities will be promptly addressed.

## License

- The HekLab framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
- The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
