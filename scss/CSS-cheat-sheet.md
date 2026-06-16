# Gutenberg CSS Cheat Sheet — Korporativni Dogadjaji

Spisak svih custom CSS klasa iz `corp-page.scss`. Dodaješ ih u Gutenberg
editoru preko **Block Settings → Advanced → Additional CSS Class(es)**.

Više klasa na istom bloku se odvajaju **razmakom** (npr. `sk-feat-card prestige`).

---

## Hero

| Klasa | Gutenberg blok | Šta predstavlja |
|---|---|---|
| `sk-hero-cover` | Cover | glavni hero container |
| `sk-hero-badge` | Paragraph | "Korporativni dogadjaji" badge |
| `sk-hero-sub` | Paragraph | subtitle ispod H1 |
| `sk-hero-stats` | Columns | wrapper za 3 statistike |
| `sk-hero-stat-num` | Paragraph | broj, npr. "200+" |
| `sk-hero-stat-label` | Paragraph | labela, npr. "korp. evenata" |
| `sk-btn-primary` | Button | crveno CTA dugme |
| `sk-btn-ghost` | Button | outline dugme |

## Trust bar

| Klasa | Gutenberg blok | Šta predstavlja |
|---|---|---|
| `sk-trust-bar` | Group | tamna traka ispod hero-a |
| `sk-trust-logos` | Buttons (wrapper) | flex red chipova |
| `sk-trust-logo` | Button | pojedinačni chip (logo hover tooltip) |

## Sekcije — generalno

| Klasa | Gutenberg blok | Šta predstavlja |
|---|---|---|
| `sk-section` | Group | osnovni padding sekcije |
| `sk-section-gray` | Group | dodaje se UZ `sk-section` |
| `sk-section-dark` | Group | dodaje se UZ `sk-section` |
| `sk-eyebrow` | Paragraph | mali naslov iznad H2 |
| `sk-section-sub` | Paragraph | opis ispod H2 |

## Problem cards

| Klasa | Gutenberg blok | Šta predstavlja |
|---|---|---|
| `sk-problem-card` | Column | jedna od 3 kartice |
| `sk-problem-icon` | Paragraph | emoji ikona |
| `sk-solution-bar` | Group | zelena poruka na dnu sekcije |

## Use cases

| Klasa | Gutenberg blok | Šta predstavlja |
|---|---|---|
| `sk-usecase-card` | Column | standardna kartica |
| `sk-usecase-card family-day` | Column | Family Day (dve klase) |
| `sk-usecase-icon` | Paragraph | emoji ikona |
| `sk-family-badge` | Paragraph | "Popularno" badge |

## How it works

| Klasa | Gutenberg blok | Šta predstavlja |
|---|---|---|
| `sk-steps-row` | Columns | wrapper za 3 koraka |
| `sk-step` | Column | jedan korak |
| `sk-step-num` | Paragraph | broj u krugu (1, 2, 3) |

## Features ("Šta dobijate")

| Klasa | Gutenberg blok | Šta predstavlja |
|---|---|---|
| `sk-feat-card` | Column | standardna feature kartica |
| `sk-feat-card prestige` | Column | Prestige kartica (dve klase) |
| `sk-feat-card keychain` | Column | Keychain kartica (dve klase) |
| `sk-feat-icon` | Paragraph | emoji ikona |

## Stats + Clients

| Klasa | Gutenberg blok | Šta predstavlja |
|---|---|---|
| `sk-stats-row` | Columns | 4 statistike u grid-u |
| `sk-stat-cell` | Column | jedna statistika |
| `sk-stat-cell-num` | Paragraph | broj (200+, 50+...) |
| `sk-stat-cell-label` | Paragraph | opis ispod broja |
| `sk-clients-label` | Paragraph | "Kompanije koje su nam ukazale poverenje" |
| `sk-clients-row` | Buttons (wrapper) | wrapper za client chipove |
| `sk-client-chip` | Button | pojedinačni client chip (logo hover tooltip) |

## Paketi

| Klasa | Gutenberg blok | Šta predstavlja |
|---|---|---|
| `sk-pkg-card` | Column | Starter kartica |
| `sk-pkg-card popular` | Column | Business (dve klase) |
| `sk-pkg-card prestige-pkg` | Column | Prestige (dve klase) |
| `sk-pkg-badge blue` / `sk-pkg-badge gold` | Paragraph | badge iznad kartice |
| `sk-pkg-name` | Paragraph | naziv paketa |
| `sk-pkg-desc` | Paragraph | "Do 100 gostiju · 3h" |
| `sk-pkg-btn-outline` | Button | CTA — Starter |
| `sk-pkg-btn-primary` | Button | CTA — Business |
| `sk-pkg-btn-gold` | Button | CTA — Prestige |

## Galerija

| Klasa | Gutenberg blok | Šta predstavlja |
|---|---|---|
| `sk-gallery-section` | Group | wrapper oko Gallery bloka |

## Blog / Novosti

| Klasa | Gutenberg blok | Šta predstavlja |
|---|---|---|
| `sk-blog-card` | Column | jedna blog kartica |
| `sk-blog-body` | Group | tekst deo kartice (ispod slike) |
| `sk-blog-cat` | Paragraph | kategorija badge |

## FAQ

| Klasa | Gutenberg blok | Šta predstavlja |
|---|---|---|
| `sk-faq-item` | Group | jedno pitanje + odgovor |

## Final CTA

| Klasa | Gutenberg blok | Šta predstavlja |
|---|---|---|
| `sk-final-cta` | Group | tamna sekcija na dnu |
| `sk-urgency-pill` | Group ili Paragraph | "Termini za Q4 se brzo popunjavaju" |
| `sk-final-btn-primary` | Button | glavno CTA dugme |
| `sk-final-btn-ghost` | Button | WhatsApp dugme |

---

## Napomene — elementi koji nisu 100% native

**`sk-hero-badge::before`** i **`sk-urgency-dot`**
Crvena tačkica je CSS `::before` pseudo-element — radi automatski čim
dodaš klasu na Paragraph/Group, nema potrebe za HTML-om.

**`sk-feat-new`** ("novo" badge unutar naslova Prestige/Keychain)
Ovo je inline `<span>` unutar teksta naslova. Opcije:
- Ostavi naslov kao plain tekst bez pill oznake (100% native, manji vizuelni gubitak)
- Ili koristi mali Custom HTML blok samo za tu reč ako želiš identičan izgled

---

## Brzi workflow za novi element

1. Dodaš native Gutenberg blok (Column, Paragraph, Button, Group...)
2. Klikneš na blok → otvori se **Settings panel** (desna strana)
3. Skroluj do **Advanced** → **Additional CSS Class(es)**
4. Upiši klasu (ili više klasa razdvojenih razmakom) iz tabele iznad
5. Stilovi iz `corp-page.css` se automatski primenjuju (CSS je već učitan na ovoj stranici)