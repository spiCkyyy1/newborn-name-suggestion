# 👶 Baby Names Suggestion App

A family-friendly web app built with **Laravel 12**, **Vue 3 (Inertia)**, **Tailwind CSS v4**, and **Laravel Sail (Docker)**. It lets every family member submit name ideas for the new baby — both boy and girl suggestions — and later randomly pick the final name when the baby arrives.

---

## 🌟 Features

* 🧑‍🤝‍🧑 Family members can submit their name suggestions.
* 🧒 Separate fields for baby boy and baby girl names.
* 🎲 Randomly shuffle and pick a name once the baby is born.
* 💾 Stores all suggestions in MySQL (via Sail).
* 🪶 Built with Vue 3 + Inertia and styled beautifully using Tailwind CSS v4.
* 🐳 Fully Dockerized with Laravel Sail.

---

## 🏗️ Tech Stack

| Layer            | Technology                                                          |
| ---------------- | ------------------------------------------------------------------- |
| Backend          | Laravel 12                                                          |
| Frontend         | Vue 3 + Inertia.js                                                  |
| Styling          | Tailwind CSS v4                                                     |
| Database         | MySQL (via Laravel Sail)                                            |
| Containerization | Docker + Laravel Sail                                               |

[//]: # (| Hosting          | Render / Fly.io / Railway &#40;free or low-cost alternatives to Heroku&#41; |)

---

## 🚀 Getting Started

### 1️⃣ Clone & Install

```bash
git clone https://github.com/spiCkyyy1/baby-names.git
cd newborn-name-suggestion
composer install
```

### 2️⃣ Setup Environment

Copy `.env.example` to `.env` and update as needed:

```bash
cp .env.example .env
php artisan key:generate
```

---

### 3️⃣ Install Sail (Docker)

```bash
php artisan sail:install --with=mysql,redis,meilisearch
./vendor/bin/sail up -d
```

> 🐳 Requires Docker Desktop running.

---

### 4️⃣ Install Frontend Dependencies

```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

---

### 5️⃣ Run Migrations

```bash
./vendor/bin/sail artisan migrate
```

Open [http://localhost](http://localhost) and start adding name suggestions! 🎉

---

## 🧰 Folder Overview

```
app/
 ├── Http/
 │   ├── Controllers/
 │   │   └── NameSuggestionController.php
 │   └── Requests/
 │       └── StoreNameSuggestionRequest.php
 ├── Models/
 │   └── NameSuggestion.php
resources/
 ├── js/
 │   ├── Pages/Home.vue
 │   └── Components/
 │       ├── SuggestionForm.vue
 │       └── SuggestionList.vue
 └── views/app.blade.php
```

---

## 🧠 How It Works

1. **Family members** open the site and fill in:

    * Their name
    * Relation (e.g., Aunt, Grandpa)
    * Boy name suggestion
    * Girl name suggestion

2. Suggestions are stored in MySQL.

3. When ready, click **Pick Random Name** for boy or girl — the app shuffles and picks one at random.

---

## 🧑‍💻 Development Commands

| Action           | Command                             |
| ---------------- | ----------------------------------- |
| Start containers | `./vendor/bin/sail up -d`           |
| Stop containers  | `./vendor/bin/sail down`            |
| Run migrations   | `./vendor/bin/sail artisan migrate` |
| Run tests        | `./vendor/bin/sail artisan test`    |
| Build assets     | `./vendor/bin/sail npm run build`   |
| Run dev server   | `./vendor/bin/sail npm run dev`     |

---

## 💾 Viewing the Database

To check your MySQL database from PhpStorm:

1. Run `./vendor/bin/sail ps` and note the forwarded port for MySQL (e.g., `3307`).
2. In PhpStorm → **Database Tool Window** → **+ → Data Source → MySQL**
3. Enter these details:

    * Host: `127.0.0.1`
    * Port: (from `sail ps`, e.g. `3307`)
    * User: `sail`
    * Password: `password`
    * Database: `laravel`
4. Test the connection → Save → Browse tables!

---

[//]: # ()
[//]: # (## ☁️ Deployment)

[//]: # ()
[//]: # (### Recommended Free/Low-Cost Hosts)

[//]: # ()
[//]: # (| Platform              | Description                                     |)

[//]: # (| --------------------- | ----------------------------------------------- |)

[//]: # (| **Render**            | Simple Docker-based hosting for Laravel apps    |)

[//]: # (| **Fly.io**            | Lightweight containers, free hobby tier         |)

[//]: # (| **Railway.app**       | Automatic deploys from GitHub, easy MySQL setup |)

[//]: # (| **Vercel &#40;Frontend&#41;** | Great if you separate API/backend               |)

[//]: # ()
[//]: # (> ⚠️ Heroku no longer offers a free tier.)

[//]: # ()
[//]: # (### Deployment Notes)

[//]: # ()
[//]: # (* Use the same Dockerfile and Sail config to deploy on Render or Fly.io.)

[//]: # (* For quick testing, Railway is easiest — just link your GitHub repo.)

[//]: # ()
[//]: # (---)

[//]: # ()
[//]: # (## 🧪 Example Test)

[//]: # ()
[//]: # (A simple feature test ensures submissions work:)

[//]: # ()
[//]: # (```php)

[//]: # (public function test_can_create_suggestion&#40;&#41;)

[//]: # ({)

[//]: # (    $payload = [)

[//]: # (        'family_member_name' => 'Alice',)

[//]: # (        'relation' => 'Aunt',)

[//]: # (        'boy_name' => 'Oliver',)

[//]: # (        'girl_name' => 'Olivia',)

[//]: # (    ];)

[//]: # ()
[//]: # (    $this->postJson&#40;'/api/suggestions', $payload&#41;)

[//]: # (         ->assertStatus&#40;201&#41;)

[//]: # (         ->assertJsonFragment&#40;['family_member_name' => 'Alice']&#41;;)

[//]: # (})

[//]: # (```)

[//]: # ()
[//]: # (Run tests:)

[//]: # ()
[//]: # (```bash)

[//]: # (./vendor/bin/sail artisan test)

[//]: # (```)

[//]: # ()
[//]: # (---)

[//]: # (## 💡 Future Enhancements)

[//]: # ()
[//]: # (* 🔒 Lock submissions after baby is born.)

[//]: # (* 🔑 Add simple authentication &#40;Laravel Breeze + Inertia&#41;.)

[//]: # (* 🕵️ Anonymous submission toggle.)

[//]: # (* 💌 Email notifications to family members.)

[//]: # (* 🏷️ Filter, sort, or search names.)

[//]: # (---)

[//]: # (## 🧑‍🎨 Credits)

[//]: # ()
[//]: # (Developed with ❤️ by our family, using:)

[//]: # ()
[//]: # (* Laravel 12 &#40;PHP 8.2+&#41;)

[//]: # (* Vue 3 + Inertia)

[//]: # (* Tailwind CSS v4)

[//]: # (* Docker + Sail)

[//]: # (---)

## 🪪 License

MIT License © 2025 — Feel free to fork, modify, and share within your family.

[//]: # (---)

### 🌈 Have Fun Choosing the Perfect Baby Name!
