let currentAdIndex = 0;
const slides = document.querySelectorAll(".ad-slide");
const dotsContainer = document.getElementById("adDots");

// สร้าง dots
slides.forEach((_, index) => {
  const dot = document.createElement("span");
  dot.addEventListener("click", () => showSlide(index));
  dotsContainer.appendChild(dot);
});
updateDots();

function showSlide(index) {
  slides.forEach((slide, i) => {
    slide.classList.toggle("active", i === index);
  });
  currentAdIndex = index;
  updateDots();
}

function nextAd() {
  currentAdIndex = (currentAdIndex + 1) % slides.length;
  showSlide(currentAdIndex);
}

function prevAd() {
  currentAdIndex = (currentAdIndex - 1 + slides.length) % slides.length;
  showSlide(currentAdIndex);
}

function updateDots() {
  const dots = document.querySelectorAll("#adDots span");
  dots.forEach((dot, i) => {
    dot.classList.toggle("active-dot", i === currentAdIndex);
  });
}


// Auto slide every 5 seconds
setInterval(nextAd, 5000);
const express = require('express');
const cors = require('cors');
const db = require('./db');

const app = express();
const port = 3000;

app.use(cors());
app.use(express.json());

// 📥 GET: ดึงข่าวทั้งหมด
app.get('/api/news', (req, res) => {
  db.all('SELECT * FROM news', [], (err, rows) => {
    if (err) return res.status(500).json({ error: err.message });
    res.json(rows);
  });
});

// 📥 GET: ดึงข่าวตาม ID
app.get('/api/news/:id', (req, res) => {
  const id = req.params.id;
  db.get('SELECT * FROM news WHERE id = ?', [id], (err, row) => {
    if (err) return res.status(500).json({ error: err.message });
    if (!row) return res.status(404).json({ error: 'ข่าวไม่พบ' });
    res.json(row);
  });
});

// 📤 POST: เพิ่มข่าวใหม่
app.post('/api/news', (req, res) => {
  const { title, content } = req.body;
  db.run('INSERT INTO news (title, content) VALUES (?, ?)', [title, content], function (err) {
    if (err) return res.status(500).json({ error: err.message });
    res.json({ id: this.lastID, title, content });
  });
});

// 🚀 เริ่มเซิร์ฟเวอร์
app.listen(port, () => {
  console.log(`✅ News API running at http://localhost:${port}`);
});