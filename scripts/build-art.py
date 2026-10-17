"""Generates the built-in editorial illustrations in public/images/art.

They are deliberately abstract, brand-coloured compositions that act as
placeholders until real photography is uploaded through the CMS media library.
Run: python3 scripts/build-art.py
"""
from pathlib import Path

OUT = Path(__file__).resolve().parent.parent / 'public' / 'images' / 'art'
OUT.mkdir(parents=True, exist_ok=True)

NAVY, TEAL, GOLD = '#1b2023', '#0e7f75', '#19baab'
IVORY, MIST, TEAL_L, SKY, DEEP = '#f6f5f1', '#eef5f4', '#cdeae6', '#e4e9eb', '#0c0f11'
WHITE = '#ffffff'


def bust(x, y, s=1.0, fill=NAVY, head=None):
    """Abstract person: head circle + shoulders."""
    head = head or fill
    return (f'<g transform="translate({x} {y}) scale({s})">'
            f'<circle cx="0" cy="-58" r="30" fill="{head}"/>'
            f'<path d="M-62 40c0-44 28-70 62-70s62 26 62 70z" fill="{fill}"/></g>')


def card(x, y, w, h, kind='lines', accent=TEAL):
    r = 18
    out = [f'<g transform="translate({x} {y})" filter="url(#sh)">',
           f'<rect width="{w}" height="{h}" rx="{r}" fill="{WHITE}"/>']
    if kind == 'stat':
        out.append(f'<circle cx="40" cy="{h/2}" r="20" fill="{accent}" opacity=".15"/><circle cx="40" cy="{h/2}" r="9" fill="{accent}"/>')
        out.append(f'<rect x="76" y="{h/2-14}" width="{w-110}" height="10" rx="5" fill="{NAVY}" opacity=".85"/>')
        out.append(f'<rect x="76" y="{h/2+6}" width="{(w-110)*0.65:.0f}" height="8" rx="4" fill="{NAVY}" opacity=".25"/>')
    elif kind == 'bars':
        bw = (w - 60) / 5
        for i, v in enumerate([.35, .55, .45, .75, .9]):
            bh = (h - 50) * v
            out.append(f'<rect x="{30 + i*bw + 6:.0f}" y="{h-22-bh:.0f}" width="{bw-12:.0f}" height="{bh:.0f}" rx="5" fill="{accent if i == 4 else NAVY}" opacity="{1 if i == 4 else .2}"/>')
    elif kind == 'check':
        for i in range(3):
            yy = 28 + i * 30
            out.append(f'<circle cx="34" cy="{yy}" r="9" fill="{accent}"/><path d="M29 {yy}l4 4 7-8" stroke="#fff" stroke-width="2.6" fill="none" stroke-linecap="round" stroke-linejoin="round"/>')
            out.append(f'<rect x="54" y="{yy-5}" width="{w-90 - i*22}" height="10" rx="5" fill="{NAVY}" opacity="{.7 if i == 0 else .22}"/>')
    elif kind == 'avatar':
        out.append(f'<circle cx="42" cy="{h/2}" r="22" fill="{TEAL_L}"/>' + bust(42, h/2 + 12, .32, NAVY))
        out.append(f'<rect x="78" y="{h/2-12}" width="{w-110}" height="10" rx="5" fill="{NAVY}" opacity=".8"/><rect x="78" y="{h/2+6}" width="{(w-110)*.5:.0f}" height="8" rx="4" fill="{accent}" opacity=".6"/>')
    else:
        for i in range(3):
            out.append(f'<rect x="26" y="{26 + i*22}" width="{w-52 - i*30}" height="9" rx="4.5" fill="{NAVY}" opacity="{.75 if i == 0 else .2}"/>')
    out.append('</g>')
    return ''.join(out)


def defs(bg1, bg2):
    return (f'<defs><linearGradient id="bg" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="{bg1}"/><stop offset="1" stop-color="{bg2}"/></linearGradient>'
            f'<linearGradient id="tg" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#19baab"/><stop offset="1" stop-color="{TEAL}"/></linearGradient>'
            f'<linearGradient id="ng" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#30373b"/><stop offset="1" stop-color="{NAVY}"/></linearGradient>'
            f'<linearGradient id="gg" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#6fd6cc"/><stop offset="1" stop-color="{GOLD}"/></linearGradient>'
            '<pattern id="dots" width="22" height="22" patternUnits="userSpaceOnUse"><circle cx="2" cy="2" r="1.6" fill="#1b2023" opacity=".14"/></pattern>'
            '<filter id="sh" x="-20%" y="-20%" width="140%" height="160%"><feDropShadow dx="0" dy="10" stdDeviation="14" flood-color="#1b2023" flood-opacity=".14"/></filter>'
            '</defs>')


def svg(w, h, body, bg1=IVORY, bg2=MIST, dark=False):
    base = f'<rect width="{w}" height="{h}" fill="url(#bg)"/>'
    return (f'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 {w} {h}" preserveAspectRatio="xMidYMid slice" role="img">'
            + defs(bg1, bg2) + base + body + '</svg>\n')


# ---------------------------------------------------------------- subjects (600x600 local box)
def s_medical():
    return ('<path d="M300 40l200 70v150c0 140-90 240-200 290C190 500 100 400 100 260V110z" fill="url(#tg)"/>'
            '<path d="M300 78l164 57v125c0 118-74 202-164 246-90-44-164-128-164-246V135z" fill="#fff" opacity=".12"/>'
            '<path d="M150 300h80l30-70 50 140 40-100 25 30h75" fill="none" stroke="#fff" stroke-width="22" stroke-linecap="round" stroke-linejoin="round"/>'
            f'<g transform="translate(430 70)"><circle r="62" fill="{WHITE}"/><path d="M-12-36h24v24h24v24h-24v24h-24v-24h-24v-24h24z" fill="{GOLD}"/></g>')


def s_people(n=3):
    xs = [180, 300, 420] if n == 3 else [130, 250, 370, 490]
    cols = [TEAL, NAVY, GOLD, '#5b6670']
    return ''.join(bust(x, 470 - (40 if i % 2 else 0), 1.25, cols[i % 4]) for i, x in enumerate(xs))


def s_life():
    return ('<path d="M60 300C60 160 170 70 300 70s240 90 240 230c-40-30-80-30-120 0-40-30-80-30-120 0-40-30-80-30-120 0-40-30-80-30-120 0z" fill="url(#gg)"/>'
            '<path d="M300 70v380c0 40-60 40-60 0" fill="none" stroke="#1b2023" stroke-width="16" stroke-linecap="round"/>'
            + bust(205, 540, 1.05, NAVY) + bust(395, 540, 1.05, TEAL) + bust(300, 560, .72, GOLD, '#6fd6cc'))


def s_auto():
    return ('<path d="M40 560L240 300h120l200 260z" fill="#1b2023" opacity=".9"/>'
            '<path d="M300 320v40M300 400v50M300 490v60" stroke="#fff" stroke-width="10" stroke-linecap="round" opacity=".7"/>'
            '<g transform="translate(70 120)"><path d="M20 190c0-30 18-44 50-50l60-60c18-18 40-26 66-26h120c26 0 48 10 64 28l46 54c40 6 64 22 64 54v40c0 10-8 18-18 18H38c-10 0-18-8-18-18z" fill="url(#tg)"/>'
            '<path d="M150 96c10-10 24-16 40-16h56v66H96z" fill="#fff" opacity=".85"/><path d="M262 80h52c16 0 30 6 40 18l40 48H262z" fill="#fff" opacity=".85"/>'
            '<circle cx="120" cy="234" r="44" fill="#1b2023"/><circle cx="120" cy="234" r="18" fill="#cfe6e4"/><circle cx="370" cy="234" r="44" fill="#1b2023"/><circle cx="370" cy="234" r="18" fill="#cfe6e4"/></g>'
            f'<g transform="translate(470 80)"><path d="M0-50l46 16v34c0 32-20 54-46 66C-26 54-46 32-46 0v-34z" fill="{GOLD}"/><path d="M-18 4l12 12 26-28" stroke="#fff" stroke-width="9" fill="none" stroke-linecap="round" stroke-linejoin="round"/></g>')


def s_property():
    out = ['<rect x="60" y="200" width="150" height="340" rx="8" fill="url(#ng)"/>',
           '<rect x="230" y="90" width="170" height="450" rx="8" fill="url(#tg)"/>',
           '<rect x="420" y="260" width="130" height="280" rx="8" fill="#5b6670"/>']
    for bx, by, cols, rows, w in [(60, 200, 3, 7, 150), (230, 90, 3, 9, 170), (420, 260, 2, 5, 130)]:
        cw = (w - 30) / cols
        for r in range(rows):
            for c in range(cols):
                out.append(f'<rect x="{bx + 15 + c*cw + 6:.0f}" y="{by + 24 + r*44}" width="{cw-12:.0f}" height="22" rx="3" fill="#fff" opacity="{.75 if (r + c) % 3 else .25}"/>')
    out.append(f'<rect x="20" y="540" width="560" height="14" rx="7" fill="{NAVY}" opacity=".3"/>')
    out.append(f'<g transform="translate(500 120)"><circle r="64" fill="{WHITE}"/><path d="M0-36l32 11v24c0 23-14 39-32 47-18-8-32-24-32-47v-24z" fill="{GOLD}"/></g>')
    return ''.join(out)


def s_network():
    nodes = [(300, 150, NAVY), (150, 330, TEAL), (450, 330, TEAL), (90, 520, GOLD), (240, 520, '#5b6670'), (360, 520, GOLD), (510, 520, '#5b6670')]
    links = [(0, 1), (0, 2), (1, 3), (1, 4), (2, 5), (2, 6), (1, 2)]
    out = [f'<line x1="{nodes[a][0]}" y1="{nodes[a][1]-30}" x2="{nodes[b][0]}" y2="{nodes[b][1]-30}" stroke="{NAVY}" stroke-width="5" opacity=".25"/>' for a, b in links]
    for i, (x, y, c) in enumerate(nodes):
        s = 1.0 if i == 0 else (.78 if i < 3 else .58)
        out.append(f'<circle cx="{x}" cy="{y-30}" r="{78*s:.0f}" fill="#fff" filter="url(#sh)"/>' + bust(x, y - 10 * s, s * .9, c))
    return ''.join(out)


def s_od():
    out = []
    scattered = [(70, 380, -18), (150, 470, 12), (110, 280, 24), (190, 360, -8)]
    for x, y, r in scattered:
        out.append(f'<rect x="{x}" y="{y}" width="70" height="70" rx="12" fill="{NAVY}" opacity=".18" transform="rotate({r} {x+35} {y+35})"/>')
    out.append(f'<path d="M260 380h70" stroke="{GOLD}" stroke-width="18" stroke-linecap="round"/><path d="M318 344l42 36-42 36" fill="none" stroke="{GOLD}" stroke-width="18" stroke-linecap="round" stroke-linejoin="round"/>')
    for r in range(3):
        for c in range(3):
            fill = 'url(#tg)' if (r + c) % 2 == 0 else 'url(#ng)'
            out.append(f'<rect x="{390 + c*64}" y="{260 + r*64}" width="54" height="54" rx="10" fill="{fill}"/>')
    out.append(f'<circle cx="470" cy="160" r="46" fill="{GOLD}" opacity=".9"/><path d="M450 160l14 14 26-30" stroke="#fff" stroke-width="10" fill="none" stroke-linecap="round" stroke-linejoin="round"/>')
    return ''.join(out)


def s_training():
    return ('<rect x="90" y="70" width="420" height="270" rx="18" fill="url(#ng)"/>'
            '<rect x="120" y="100" width="360" height="210" rx="10" fill="#fff" opacity=".1"/>'
            f'<path d="M150 270l70-60 60 40 80-90 70 50" fill="none" stroke="{GOLD}" stroke-width="14" stroke-linecap="round" stroke-linejoin="round"/>'
            '<rect x="290" y="340" width="20" height="60" fill="#1b2023"/>'
            + bust(150, 560, .9, TEAL) + bust(300, 575, .9, NAVY) + bust(450, 560, .9, '#5b6670')
            + f'<g transform="translate(470 420) rotate(-8)"><path d="M0 0c40-18 80-18 110 0v90c-30-18-70-18-110 0z" fill="{GOLD}"/><path d="M110 0c30-18 70-18 110 0v90c-40-18-80-18-110 0z" fill="#6fd6cc"/></g>')


def s_growth():
    out = []
    for i, v in enumerate([.3, .45, .4, .62, .8, 1.0]):
        h = 360 * v
        out.append(f'<rect x="{80 + i*78}" y="{540-h:.0f}" width="56" height="{h:.0f}" rx="10" fill="{"url(#tg)" if i > 3 else "url(#ng)"}" opacity="{1 if i > 3 else .85}"/>')
    out.append(f'<path d="M90 400L250 330l110 40 180-200" fill="none" stroke="{GOLD}" stroke-width="16" stroke-linecap="round" stroke-linejoin="round"/>')
    out.append(f'<path d="M490 160l60 0 0 60" fill="none" stroke="{GOLD}" stroke-width="16" stroke-linecap="round" stroke-linejoin="round"/>')
    out.append(f'<g transform="translate(150 140)"><circle r="70" fill="#fff" filter="url(#sh)"/><circle r="50" fill="none" stroke="{TEAL}" stroke-width="10"/><circle r="26" fill="none" stroke="{NAVY}" stroke-width="10"/><circle r="8" fill="{GOLD}"/></g>')
    return ''.join(out)


def s_exec():
    return ('<path d="M80 560L260 260l80 110 70-90 150 280z" fill="#1a2023"/>'
            f'<path d="M260 260l40 55-30 18-20-30-30 40z" fill="{GOLD}" opacity=".8"/>'
            f'<g transform="translate(330 70)"><path d="M70 0v40M50 20h40" stroke="{GOLD}" stroke-width="12" stroke-linecap="round"/>'
            f'<path d="M30 70c0-20 18-30 40-30s40 10 40 30c0 18-14 26-14 40h-52c0-14-14-22-14-40z" fill="{GOLD}"/>'
            f'<path d="M20 130h100l-12 140H32z" fill="url(#gg)"/><rect x="0" y="270" width="140" height="34" rx="8" fill="{GOLD}"/><rect x="-14" y="304" width="168" height="28" rx="8" fill="#6fd6cc"/></g>'
            '<circle cx="140" cy="140" r="80" fill="none" stroke="#19baab" stroke-width="3" opacity=".5"/><circle cx="140" cy="140" r="50" fill="none" stroke="#19baab" stroke-width="2" opacity=".35"/>')


def s_hub():
    out = [f'<circle cx="300" cy="300" r="230" fill="none" stroke="{TEAL}" stroke-width="3" stroke-dasharray="6 12" opacity=".6"/>',
           '<circle cx="300" cy="300" r="150" fill="#fff" filter="url(#sh)"/>',
           bust(250, 360, .85, TEAL), bust(350, 360, .85, NAVY), bust(300, 390, .62, GOLD, '#6fd6cc')]
    icons = [(300, 70, TEAL, 'M-16-4h12v-12h8v12h12v8H4v12h-8V4h-12z'), (530, 300, NAVY, 'M0-18l16 6v12c0 12-7 20-16 24-9-4-16-12-16-24v-12z'),
             (300, 530, GOLD, 'M-18-8h36v22h-36zM-8-8v-6h16v6'), (70, 300, '#5b6670', 'M-18-2l18-10 18 10-18 10zM-10 4v8c6 6 14 6 20 0V4')]
    for x, y, c, d in icons:
        out.append(f'<g transform="translate({x} {y})"><circle r="44" fill="{c}"/><path d="{d}" fill="#fff" stroke="#fff" stroke-width="2" stroke-linejoin="round"/></g>')
    return ''.join(out)


def s_document():
    return ('<rect x="150" y="70" width="300" height="400" rx="20" fill="#fff" filter="url(#sh)"/>'
            + ''.join(f'<rect x="190" y="{130 + i*40}" width="{220 - (i % 3)*40}" height="14" rx="7" fill="{NAVY}" opacity="{.8 if i == 0 else .2}"/>' for i in range(7))
            + f'<circle cx="430" cy="440" r="80" fill="url(#tg)"/><path d="M400 440l22 22 40-46" stroke="#fff" stroke-width="14" fill="none" stroke-linecap="round" stroke-linejoin="round"/>')


SUBJECTS = {
    'medical': s_medical, 'life': s_life, 'auto': s_auto, 'property': s_property, 'hr': s_network,
    'od': s_od, 'training': s_training, 'business_coaching': s_growth, 'executive_coaching': s_exec,
}


def blobs(w, h, c1, c2, flip=False):
    a = f'<circle cx="{w*0.78 if not flip else w*0.22:.0f}" cy="{h*0.3:.0f}" r="{min(w,h)*0.42:.0f}" fill="{c1}" opacity=".55"/>'
    b = f'<circle cx="{w*0.18 if not flip else w*0.82:.0f}" cy="{h*0.92:.0f}" r="{min(w,h)*0.3:.0f}" fill="{c2}" opacity=".5"/>'
    return a + b + f'<rect width="{w}" height="{h}" fill="url(#dots)" opacity=".7"/>'


def place(sub, x, y, s):
    return f'<g transform="translate({x} {y}) scale({s})">{sub}</g>'


def write(name, content):
    (OUT / f'{name}.svg').write_text(content)


themes = {
    'medical': (MIST, '#e3f0ef', TEAL_L, SKY, [('stat', TEAL), ('check', TEAL)]),
    'life': (IVORY, '#eef0ee', '#e6ecea', TEAL_L, [('avatar', GOLD), ('lines', GOLD)]),
    'auto': ('#eceff0', SKY, SKY, TEAL_L, [('check', TEAL), ('stat', NAVY)]),
    'property': ('#eff1f1', MIST, SKY, '#e6ecea', [('stat', GOLD), ('bars', TEAL)]),
    'hr': ('#eef1f2', '#e7ecee', SKY, TEAL_L, [('avatar', TEAL), ('bars', NAVY)]),
    'od': (IVORY, MIST, TEAL_L, '#e6ecea', [('bars', TEAL), ('check', TEAL)]),
    'training': ('#f3f4f2', IVORY, '#e6ecea', TEAL_L, [('check', GOLD), ('avatar', TEAL)]),
    'business_coaching': ('#eef4f1', MIST, TEAL_L, '#e6ecea', [('bars', TEAL), ('stat', GOLD)]),
    'executive_coaching': (DEEP, '#1a2023', '#232a2e', '#14322f', [('lines', GOLD), ('stat', GOLD)]),
}

for key, (b1, b2, c1, c2, cards) in themes.items():
    sub = SUBJECTS[key]()
    dark = key == 'executive_coaching'
    # Hero (1200x1000): subject large, two floating UI cards
    body = blobs(1200, 1000, c1, c2) + place(sub, 250, 150, 1.25)
    body += card(70, 120, 330, 96, cards[0][0], cards[0][1]) + card(800, 780, 340, 120, cards[1][0], cards[1][1])
    write(key, svg(1200, 1000, body, b1, b2))
    # Card (1200x750): subject centred smaller, single card
    body = blobs(1200, 750, c1, c2, True) + place(sub, 360, 60, 1.05) + card(80, 560, 300, 90, cards[0][0], cards[0][1])
    write(f'{key}-card', svg(1200, 750, body, b1, b2))
    # Detail (1000x1200 portrait)
    body = blobs(1000, 1200, c2, c1) + place(sub, 120, 300, 1.3) + card(560, 120, 360, 110, cards[1][0], cards[1][1])
    write(f'{key}-detail', svg(1000, 1200, body, b2, b1))

# Homepage hero, categories and generic scenes
write('home-hero', svg(1100, 1200, blobs(1100, 1200, TEAL_L, '#e6ecea') + place(s_hub(), 120, 260, 1.45)
                      + card(60, 120, 340, 96, 'stat', TEAL) + card(660, 980, 380, 120, 'check', TEAL), IVORY, MIST))
write('cat-insurance', svg(1200, 900, blobs(1200, 900, TEAL_L, SKY) + place(s_medical(), 330, 120, 1.05) + card(820, 640, 300, 96, 'stat', TEAL), MIST, '#e3f0ef'))
write('cat-people', svg(1200, 900, blobs(1200, 900, SKY, TEAL_L) + place(s_network(), 300, 100, 1.1) + card(60, 660, 320, 96, 'avatar', NAVY), '#eef1f2', MIST))
write('cat-learning', svg(1200, 900, blobs(1200, 900, '#e6ecea', TEAL_L) + place(s_training(), 300, 110, 1.05) + card(830, 120, 300, 96, 'check', GOLD), '#f3f4f2', IVORY))
write('beyond', svg(1200, 900, blobs(1200, 900, SKY, '#e6ecea') + place(s_network(), 300, 90, 1.1), '#eef1f2', IVORY))
write('people', svg(1000, 1200, blobs(1000, 1200, SKY, TEAL_L) + place(s_network(), 100, 260, 1.35) + card(540, 120, 380, 110, 'bars', TEAL), '#eef1f2', MIST))
write('about', svg(1200, 900, blobs(1200, 900, TEAL_L, '#e6ecea') + place(s_hub(), 330, 60, 1.3), IVORY, MIST))
write('cta', svg(1600, 800, f'<circle cx="1250" cy="200" r="420" fill="{TEAL}" opacity=".35"/><circle cx="300" cy="800" r="380" fill="{GOLD}" opacity=".18"/>'
                 + place(s_people(4), 900, 140, 1.15), DEEP, NAVY))
write('abstract', svg(1200, 900, blobs(1200, 900, TEAL_L, SKY), MIST, IVORY))
write('person', svg(800, 1000, f'<circle cx="400" cy="1000" r="420" fill="{TEAL_L}"/>' + bust(400, 900, 4.2, NAVY), MIST, '#e3f0ef'))
for i, (c1, c2) in enumerate([(TEAL_L, SKY), ('#e6ecea', TEAL_L), (SKY, '#e6ecea')], start=1):
    sub = [s_document, s_growth, s_medical][i - 1]()
    write(f'insight-{i}', svg(1200, 800, blobs(1200, 800, c1, c2) + place(sub, 350, 90, 1.05), IVORY, MIST))
for i, sub in enumerate([s_training, s_network, s_growth, s_exec], start=1):
    bg = (DEEP, '#1a2023') if i == 4 else ('#f3f4f2', IVORY)
    write(f'program-{i}', svg(1200, 800, blobs(1200, 800, '#e6ecea', TEAL_L) + place(sub(), 350, 90, 1.05), *bg))

print('art:', len(list(OUT.glob('*.svg'))), 'files')
