/*
 * Fancy Product Designer - jQuery plugin 3.0.31
 * Copyright 2013, Rafael Dery
 *
 * Only for the sale at the envato marketplaces
 */
function Tree() {
    var a = this;
    a.build_tree = function(b) {
        var c, d, e = a.dyn_tree,
            f = a.stat_desc.static_tree,
            g = a.stat_desc.elems,
            h = -1;
        for (b.heap_len = 0, b.heap_max = HEAP_SIZE, c = 0; g > c; c++) 0 !== e[2 * c] ? (b.heap[++b.heap_len] = h = c, b.depth[c] = 0) : e[2 * c + 1] = 0;
        for (; 2 > b.heap_len;) d = b.heap[++b.heap_len] = 2 > h ? ++h : 0, e[2 * d] = 1, b.depth[d] = 0, b.opt_len--, f && (b.static_len -= f[2 * d + 1]);
        for (a.max_code = h, c = Math.floor(b.heap_len / 2); c >= 1; c--) b.pqdownheap(e, c);
        d = g;
        do c = b.heap[1], b.heap[1] = b.heap[b.heap_len--], b.pqdownheap(e, 1), f = b.heap[1], b.heap[--b.heap_max] = c, b.heap[--b.heap_max] = f, e[2 * d] = e[2 * c] + e[2 * f], b.depth[d] = Math.max(b.depth[c], b.depth[f]) + 1, e[2 * c + 1] = e[2 * f + 1] = d, b.heap[1] = d++, b.pqdownheap(e, 1); while (2 <= b.heap_len);
        b.heap[--b.heap_max] = b.heap[1], c = a.dyn_tree;
        for (var i, j, h = a.stat_desc.static_tree, k = a.stat_desc.extra_bits, l = a.stat_desc.extra_base, m = a.stat_desc.max_length, n = 0, g = 0; MAX_BITS >= g; g++) b.bl_count[g] = 0;
        for (c[2 * b.heap[b.heap_max] + 1] = 0, d = b.heap_max + 1; HEAP_SIZE > d; d++) f = b.heap[d], g = c[2 * c[2 * f + 1] + 1] + 1, g > m && (g = m, n++), c[2 * f + 1] = g, f > a.max_code || (b.bl_count[g]++, i = 0, f >= l && (i = k[f - l]), j = c[2 * f], b.opt_len += j * (g + i), h && (b.static_len += j * (h[2 * f + 1] + i)));
        if (0 !== n) {
            do {
                for (g = m - 1; 0 === b.bl_count[g];) g--;
                b.bl_count[g]--, b.bl_count[g + 1] += 2, b.bl_count[m]--, n -= 2
            } while (n > 0);
            for (g = m; 0 !== g; g--)
                for (f = b.bl_count[g]; 0 !== f;) h = b.heap[--d], h > a.max_code || (c[2 * h + 1] != g && (b.opt_len += (g - c[2 * h + 1]) * c[2 * h], c[2 * h + 1] = g), f--)
        }
        for (c = a.max_code, d = b.bl_count, b = [], f = 0, g = 1; MAX_BITS >= g; g++) b[g] = f = f + d[g - 1] << 1;
        for (d = 0; c >= d; d++)
            if (k = e[2 * d + 1], 0 !== k) {
                f = e, g = 2 * d, h = b[k]++, l = 0;
                do l |= 1 & h, h >>>= 1, l <<= 1; while (0 < --k);
                f[g] = l >>> 1
            }
    }
}

function StaticTree(a, b, c, d, e) {
    this.static_tree = a, this.extra_bits = b, this.extra_base = c, this.elems = d, this.max_length = e
}

function Config(a, b, c, d, e) {
    this.good_length = a, this.max_lazy = b, this.nice_length = c, this.max_chain = d, this.func = e
}

function smaller(a, b, c, d) {
    var e = a[2 * b];
    return a = a[2 * c], a > e || e == a && d[b] <= d[c]
}

function Deflate() {
    function a() {
        var a;
        for (a = 0; L_CODES > a; a++) V[2 * a] = 0;
        for (a = 0; D_CODES > a; a++) W[2 * a] = 0;
        for (a = 0; BL_CODES > a; a++) X[2 * a] = 0;
        V[2 * END_BLOCK] = 1, ca = ea = Y.opt_len = Y.static_len = 0
    }

    function b(a, b) {
        var c, d, e = -1,
            f = a[1],
            g = 0,
            h = 7,
            i = 4;
        for (0 === f && (h = 138, i = 3), a[2 * (b + 1) + 1] = 65535, c = 0; b >= c; c++) d = f, f = a[2 * (c + 1) + 1], ++g < h && d == f || (i > g ? X[2 * d] += g : 0 !== d ? (d != e && X[2 * d]++, X[2 * REP_3_6]++) : 10 >= g ? X[2 * REPZ_3_10]++ : X[2 * REPZ_11_138]++, g = 0, e = d, 0 === f ? (h = 138, i = 3) : d == f ? (h = 6, i = 3) : (h = 7, i = 4))
    }

    function c(a) {
        Y.pending_buf[Y.pending++] = a
    }

    function d(a) {
        c(255 & a), c(a >>> 8 & 255)
    }

    function e(a, b) {
        ha > Buf_size - b ? (ga |= a << ha & 65535, d(ga), ga = a >>> Buf_size - ha, ha += b - Buf_size) : (ga |= a << ha & 65535, ha += b)
    }

    function f(a, b) {
        var c = 2 * a;
        e(65535 & b[c], 65535 & b[c + 1])
    }

    function g(a, b) {
        var c, d, g = -1,
            h = a[1],
            i = 0,
            j = 7,
            k = 4;
        for (0 === h && (j = 138, k = 3), c = 0; b >= c; c++)
            if (d = h, h = a[2 * (c + 1) + 1], !(++i < j && d == h)) {
                if (k > i) {
                    do f(d, X); while (0 !== --i)
                } else 0 !== d ? (d != g && (f(d, X), i--), f(REP_3_6, X), e(i - 3, 2)) : 10 >= i ? (f(REPZ_3_10, X), e(i - 3, 3)) : (f(REPZ_11_138, X), e(i - 11, 7));
                i = 0, g = d, 0 === h ? (j = 138, k = 3) : d == h ? (j = 6, k = 3) : (j = 7, k = 4)
            }
    }

    function h() {
        16 == ha ? (d(ga), ha = ga = 0) : ha >= 8 && (c(255 & ga), ga >>>= 8, ha -= 8)
    }

    function i(a, b) {
        var c, d, e;
        if (Y.pending_buf[da + 2 * ca] = a >>> 8 & 255, Y.pending_buf[da + 2 * ca + 1] = 255 & a, Y.pending_buf[aa + ca] = 255 & b, ca++, 0 === a ? V[2 * b]++ : (ea++, a--, V[2 * (Tree._length_code[b] + LITERALS + 1)]++, W[2 * Tree.d_code(a)]++), 0 === (8191 & ca) && R > 2) {
            for (c = 8 * ca, d = L - H, e = 0; D_CODES > e; e++) c += W[2 * e] * (5 + Tree.extra_dbits[e]);
            if (ea < Math.floor(ca / 2) && c >>> 3 < Math.floor(d / 2)) return !0
        }
        return ca == ba - 1
    }

    function j(a, b) {
        var c, d, g, h, i = 0;
        if (0 !== ca)
            do c = Y.pending_buf[da + 2 * i] << 8 & 65280 | 255 & Y.pending_buf[da + 2 * i + 1], d = 255 & Y.pending_buf[aa + i], i++, 0 === c ? f(d, a) : (g = Tree._length_code[d], f(g + LITERALS + 1, a), h = Tree.extra_lbits[g], 0 !== h && (d -= Tree.base_length[g], e(d, h)), c--, g = Tree.d_code(c), f(g, b), h = Tree.extra_dbits[g], 0 !== h && (c -= Tree.base_dist[g], e(c, h))); while (ca > i);
        f(END_BLOCK, a), fa = a[2 * END_BLOCK + 1]
    }

    function k() {
        ha > 8 ? d(ga) : ha > 0 && c(255 & ga), ha = ga = 0
    }

    function l(a, b, c) {
        e((STORED_BLOCK << 1) + (c ? 1 : 0), 3), k(), fa = 8, d(b), d(~b), Y.pending_buf.set(y.subarray(a, a + b), Y.pending), Y.pending += b
    }

    function m(c) {
        var d, f, h = H >= 0 ? H : -1,
            i = L - H,
            m = 0;
        if (R > 0) {
            for (Z.build_tree(Y), $.build_tree(Y), b(V, Z.max_code), b(W, $.max_code), _.build_tree(Y), m = BL_CODES - 1; m >= 3 && 0 === X[2 * Tree.bl_order[m] + 1]; m--);
            Y.opt_len += 3 * (m + 1) + 14, d = Y.opt_len + 3 + 7 >>> 3, f = Y.static_len + 3 + 7 >>> 3, d >= f && (d = f)
        } else d = f = i + 5; if (d >= i + 4 && -1 != h) l(h, i, c);
        else if (f == d) e((STATIC_TREES << 1) + (c ? 1 : 0), 3), j(StaticTree.static_ltree, StaticTree.static_dtree);
        else {
            for (e((DYN_TREES << 1) + (c ? 1 : 0), 3), h = Z.max_code + 1, i = $.max_code + 1, m += 1, e(h - 257, 5), e(i - 1, 5), e(m - 4, 4), d = 0; m > d; d++) e(X[2 * Tree.bl_order[d] + 1], 3);
            g(V, h - 1), g(W, i - 1), j(V, W)
        }
        a(), c && k(), H = L, r.flush_pending()
    }

    function n() {
        var a, b, c, d;
        do {
            if (d = z - N - L, 0 === d && 0 === L && 0 === N) d = v;
            else if (-1 == d) d--;
            else if (L >= v + v - MIN_LOOKAHEAD) {
                y.set(y.subarray(v, v + v), 0), M -= v, L -= v, H -= v, c = a = D;
                do b = 65535 & B[--c], B[c] = b >= v ? b - v : 0; while (0 !== --a);
                c = a = v;
                do b = 65535 & A[--c], A[c] = b >= v ? b - v : 0; while (0 !== --a);
                d += v
            }
            if (0 === r.avail_in) break;
            a = r.read_buf(y, L + N, d), N += a, N >= MIN_MATCH && (C = 255 & y[L], C = (C << G ^ 255 & y[L + 1]) & F)
        } while (MIN_LOOKAHEAD > N && 0 !== r.avail_in)
    }

    function o(a) {
        var b, c = 65535;
        for (c > t - 5 && (c = t - 5);;) {
            if (1 >= N) {
                if (n(), 0 === N && a == Z_NO_FLUSH) return NeedMore;
                if (0 === N) break
            }
            if (L += N, N = 0, b = H + c, (0 === L || L >= b) && (N = L - b, L = b, m(!1), 0 === r.avail_out)) return NeedMore;
            if (L - H >= v - MIN_LOOKAHEAD && (m(!1), 0 === r.avail_out)) return NeedMore
        }
        return m(a == Z_FINISH), 0 === r.avail_out ? a == Z_FINISH ? FinishStarted : NeedMore : a == Z_FINISH ? FinishDone : BlockDone
    }

    function p(a) {
        var b, c = P,
            d = L,
            e = O,
            f = L > v - MIN_LOOKAHEAD ? L - (v - MIN_LOOKAHEAD) : 0,
            g = U,
            h = x,
            i = L + MAX_MATCH,
            j = y[d + e - 1],
            k = y[d + e];
        O >= T && (c >>= 2), g > N && (g = N);
        do
            if (b = a, y[b + e] == k && y[b + e - 1] == j && y[b] == y[d] && y[++b] == y[d + 1]) {
                d += 2, b++;
                do; while (y[++d] == y[++b] && y[++d] == y[++b] && y[++d] == y[++b] && y[++d] == y[++b] && y[++d] == y[++b] && y[++d] == y[++b] && y[++d] == y[++b] && y[++d] == y[++b] && i > d);
                if (b = MAX_MATCH - (i - d), d = i - MAX_MATCH, b > e) {
                    if (M = a, e = b, b >= g) break;
                    j = y[d + e - 1], k = y[d + e]
                }
            } while ((a = 65535 & A[a & h]) > f && 0 !== --c);
        return N >= e ? e : N
    }

    function q(a) {
        for (var b, c, d = 0;;) {
            if (MIN_LOOKAHEAD > N) {
                if (n(), MIN_LOOKAHEAD > N && a == Z_NO_FLUSH) return NeedMore;
                if (0 === N) break
            }
            if (N >= MIN_MATCH && (C = (C << G ^ 255 & y[L + (MIN_MATCH - 1)]) & F, d = 65535 & B[C], A[L & x] = B[C], B[C] = L), O = I, J = M, I = MIN_MATCH - 1, 0 !== d && Q > O && v - MIN_LOOKAHEAD >= (L - d & 65535) && (S != Z_HUFFMAN_ONLY && (I = p(d)), 5 >= I && (S == Z_FILTERED || I == MIN_MATCH && L - M > 4096) && (I = MIN_MATCH - 1)), O >= MIN_MATCH && O >= I) {
                c = L + N - MIN_MATCH, b = i(L - 1 - J, O - MIN_MATCH), N -= O - 1, O -= 2;
                do ++
                L <= c && (C = (C << G ^ 255 & y[L + (MIN_MATCH - 1)]) & F, d = 65535 & B[C], A[L & x] = B[C], B[C] = L);
                while (0 !== --O);
                if (K = 0, I = MIN_MATCH - 1, L++, b && (m(!1), 0 === r.avail_out)) return NeedMore
            } else if (0 !== K) {
                if ((b = i(0, 255 & y[L - 1])) && m(!1), L++, N--, 0 === r.avail_out) return NeedMore
            } else K = 1, L++, N--
        }
        return 0 !== K && (i(0, 255 & y[L - 1]), K = 0), m(a == Z_FINISH), 0 === r.avail_out ? a == Z_FINISH ? FinishStarted : NeedMore : a == Z_FINISH ? FinishDone : BlockDone
    }
    var r, s, t, u, v, w, x, y, z, A, B, C, D, E, F, G, H, I, J, K, L, M, N, O, P, Q, R, S, T, U, V, W, X, Y = this,
        Z = new Tree,
        $ = new Tree,
        _ = new Tree;
    Y.depth = [];
    var aa, ba, ca, da, ea, fa, ga, ha;
    Y.bl_count = [], Y.heap = [], V = [], W = [], X = [], Y.pqdownheap = function(a, b) {
        for (var c = Y.heap, d = c[b], e = b << 1; e <= Y.heap_len && (e < Y.heap_len && smaller(a, c[e + 1], c[e], Y.depth) && e++, !smaller(a, d, c[e], Y.depth));) c[b] = c[e], b = e, e <<= 1;
        c[b] = d
    }, Y.deflateInit = function(b, c, d, e, f, g) {
        if (e || (e = Z_DEFLATED), f || (f = DEF_MEM_LEVEL), g || (g = Z_DEFAULT_STRATEGY), b.msg = null, c == Z_DEFAULT_COMPRESSION && (c = 6), 1 > f || f > MAX_MEM_LEVEL || e != Z_DEFLATED || 9 > d || d > 15 || 0 > c || c > 9 || 0 > g || g > Z_HUFFMAN_ONLY) return Z_STREAM_ERROR;
        for (b.dstate = Y, w = d, v = 1 << w, x = v - 1, E = f + 7, D = 1 << E, F = D - 1, G = Math.floor((E + MIN_MATCH - 1) / MIN_MATCH), y = new Uint8Array(2 * v), A = [], B = [], ba = 1 << f + 6, Y.pending_buf = new Uint8Array(4 * ba), t = 4 * ba, da = Math.floor(ba / 2), aa = 3 * ba, R = c, S = g, b.total_in = b.total_out = 0, b.msg = null, Y.pending = 0, Y.pending_out = 0, s = BUSY_STATE, u = Z_NO_FLUSH, Z.dyn_tree = V, Z.stat_desc = StaticTree.static_l_desc, $.dyn_tree = W, $.stat_desc = StaticTree.static_d_desc, _.dyn_tree = X, _.stat_desc = StaticTree.static_bl_desc, ha = ga = 0, fa = 8, a(), z = 2 * v, b = B[D - 1] = 0; D - 1 > b; b++) B[b] = 0;
        return Q = config_table[R].max_lazy, T = config_table[R].good_length, U = config_table[R].nice_length, P = config_table[R].max_chain, N = H = L = 0, I = O = MIN_MATCH - 1, C = K = 0, Z_OK
    }, Y.deflateEnd = function() {
        return s != INIT_STATE && s != BUSY_STATE && s != FINISH_STATE ? Z_STREAM_ERROR : (y = A = B = Y.pending_buf = null, Y.dstate = null, s == BUSY_STATE ? Z_DATA_ERROR : Z_OK)
    }, Y.deflateParams = function(a, b, c) {
        var d = Z_OK;
        return b == Z_DEFAULT_COMPRESSION && (b = 6), 0 > b || b > 9 || 0 > c || c > Z_HUFFMAN_ONLY ? Z_STREAM_ERROR : (config_table[R].func != config_table[b].func && 0 !== a.total_in && (d = a.deflate(Z_PARTIAL_FLUSH)), R != b && (R = b, Q = config_table[R].max_lazy, T = config_table[R].good_length, U = config_table[R].nice_length, P = config_table[R].max_chain), S = c, d)
    }, Y.deflateSetDictionary = function(a, b, c) {
        a = c;
        var d = 0;
        if (!b || s != INIT_STATE) return Z_STREAM_ERROR;
        if (MIN_MATCH > a) return Z_OK;
        for (a > v - MIN_LOOKAHEAD && (a = v - MIN_LOOKAHEAD, d = c - a), y.set(b.subarray(d, d + a), 0), H = L = a, C = 255 & y[0], C = (C << G ^ 255 & y[1]) & F, b = 0; a - MIN_MATCH >= b; b++) C = (C << G ^ 255 & y[b + (MIN_MATCH - 1)]) & F, A[b & x] = B[C], B[C] = b;
        return Z_OK
    }, Y.deflate = function(a, b) {
        var d, g, j;
        if (b > Z_FINISH || 0 > b) return Z_STREAM_ERROR;
        if (!a.next_out || !a.next_in && 0 !== a.avail_in || s == FINISH_STATE && b != Z_FINISH) return a.msg = z_errmsg[Z_NEED_DICT - Z_STREAM_ERROR], Z_STREAM_ERROR;
        if (0 === a.avail_out) return a.msg = z_errmsg[Z_NEED_DICT - Z_BUF_ERROR], Z_BUF_ERROR;
        if (r = a, d = u, u = b, s == INIT_STATE && (g = Z_DEFLATED + (w - 8 << 4) << 8, j = (R - 1 & 255) >> 1, j > 3 && (j = 3), g |= j << 6, 0 !== L && (g |= PRESET_DICT), s = BUSY_STATE, g += 31 - g % 31, c(g >> 8 & 255), c(255 & g)), 0 !== Y.pending) {
            if (r.flush_pending(), 0 === r.avail_out) return u = -1, Z_OK
        } else if (0 === r.avail_in && d >= b && b != Z_FINISH) return r.msg = z_errmsg[Z_NEED_DICT - Z_BUF_ERROR], Z_BUF_ERROR;
        if (s == FINISH_STATE && 0 !== r.avail_in) return a.msg = z_errmsg[Z_NEED_DICT - Z_BUF_ERROR], Z_BUF_ERROR;
        if (0 !== r.avail_in || 0 !== N || b != Z_NO_FLUSH && s != FINISH_STATE) {
            switch (d = -1, config_table[R].func) {
                case STORED:
                    d = o(b);
                    break;
                case FAST:
                    a: {
                        for (d = 0;;) {
                            if (MIN_LOOKAHEAD > N) {
                                if (n(), MIN_LOOKAHEAD > N && b == Z_NO_FLUSH) {
                                    d = NeedMore;
                                    break a
                                }
                                if (0 === N) break
                            }
                            if (N >= MIN_MATCH && (C = (C << G ^ 255 & y[L + (MIN_MATCH - 1)]) & F, d = 65535 & B[C], A[L & x] = B[C], B[C] = L), 0 !== d && v - MIN_LOOKAHEAD >= (L - d & 65535) && S != Z_HUFFMAN_ONLY && (I = p(d)), I >= MIN_MATCH)
                                if (g = i(L - M, I - MIN_MATCH), N -= I, Q >= I && N >= MIN_MATCH) {
                                    I--;
                                    do L++, C = (C << G ^ 255 & y[L + (MIN_MATCH - 1)]) & F, d = 65535 & B[C], A[L & x] = B[C], B[C] = L; while (0 !== --I);
                                    L++
                                } else L += I, I = 0, C = 255 & y[L], C = (C << G ^ 255 & y[L + 1]) & F;
                                else g = i(0, 255 & y[L]), N--, L++;
                            if (g && (m(!1), 0 === r.avail_out)) {
                                d = NeedMore;
                                break a
                            }
                        }
                        m(b == Z_FINISH), d = 0 === r.avail_out ? b == Z_FINISH ? FinishStarted : NeedMore : b == Z_FINISH ? FinishDone : BlockDone
                    }
                    break;
                case SLOW:
                    d = q(b)
            }
            if ((d == FinishStarted || d == FinishDone) && (s = FINISH_STATE), d == NeedMore || d == FinishStarted) return 0 === r.avail_out && (u = -1), Z_OK;
            if (d == BlockDone) {
                if (b == Z_PARTIAL_FLUSH) e(STATIC_TREES << 1, 3), f(END_BLOCK, StaticTree.static_ltree), h(), 9 > 1 + fa + 10 - ha && (e(STATIC_TREES << 1, 3), f(END_BLOCK, StaticTree.static_ltree), h()), fa = 7;
                else if (l(0, 0, !1), b == Z_FULL_FLUSH)
                    for (d = 0; D > d; d++) B[d] = 0;
                if (r.flush_pending(), 0 === r.avail_out) return u = -1, Z_OK
            }
        }
        return b != Z_FINISH ? Z_OK : Z_STREAM_END
    }
}

function ZStream() {
    this.total_out = this.avail_out = this.total_in = this.avail_in = this.next_out_index = this.next_in_index = 0
}

function Deflater(a) {
    var b = new ZStream,
        c = Z_NO_FLUSH,
        d = new Uint8Array(512);
    "undefined" == typeof a && (a = Z_DEFAULT_COMPRESSION), b.deflateInit(a), b.next_out = d, this.append = function(a, e) {
        var f, g, h = [],
            i = 0,
            j = 0,
            k = 0;
        if (a.length) {
            b.next_in_index = 0, b.next_in = a, b.avail_in = a.length;
            do {
                if (b.next_out_index = 0, b.avail_out = 512, f = b.deflate(c), f != Z_OK) throw "deflating: " + b.msg;
                b.next_out_index && h.push(512 == b.next_out_index ? new Uint8Array(d) : new Uint8Array(d.subarray(0, b.next_out_index))), k += b.next_out_index, e && 0 < b.next_in_index && b.next_in_index != i && (e(b.next_in_index), i = b.next_in_index)
            } while (0 < b.avail_in || 0 === b.avail_out);
            return g = new Uint8Array(k), h.forEach(function(a) {
                g.set(a, j), j += a.length
            }), g
        }
    }, this.flush = function() {
        var a, c, e = [],
            f = 0,
            g = 0;
        do {
            if (b.next_out_index = 0, b.avail_out = 512, a = b.deflate(Z_FINISH), a != Z_STREAM_END && a != Z_OK) throw "deflating: " + b.msg;
            0 < 512 - b.avail_out && e.push(new Uint8Array(d.subarray(0, b.next_out_index))), g += b.next_out_index
        } while (0 < b.avail_in || 0 === b.avail_out);
        return b.deflateEnd(), c = new Uint8Array(g), e.forEach(function(a) {
            c.set(a, f), f += a.length
        }), c
    }
}! function(a) {
    "use strict";
    var b = a.fabric || (a.fabric = {}),
        c = b.util.object.extend,
        d = b.util.object.clone;
    if (b.CurvedText) return void b.warn("fabric.CurvedText is already defined");
    var e = b.Text.prototype.stateProperties.concat();
    e.push("radius", "spacing", "reverse", "effect", "range", "largeFont", "smallFont");
    var f = b.Text.prototype._dimensionAffectingProps;
    f.radius = !0, f.spacing = !0, f.reverse = !0, f.fill = !0, f.effect = !0, f.width = !0, f.height = !0, f.range = !0, f.fontSize = !0, f.shadow = !0, f.largeFont = !0, f.smallFont = !0;
    var g = b.Group.prototype.delegatedProperties;
    g.backgroundColor = !0, g.textBackgroundColor = !0, g.textDecoration = !0, g.stroke = !0, g.strokeWidth = !0, g.shadow = !0, b.CurvedText = b.util.createClass(b.Text, b.Collection, {
        type: "curvedText",
        radius: 50,
        range: 5,
        smallFont: 10,
        largeFont: 30,
        effect: "curved",
        spacing: 0,
        reverse: !1,
        stateProperties: e,
        delegatedProperties: g,
        _dimensionAffectingProps: f,
        _isRendering: 0,
        complexity: function() {
            this.callSuper("complexity")
        },
        initialize: function(a, c) {
            c || (c = {}), this.letters = new b.Group([], {
                selectable: !1,
                padding: 0
            }), this.__skipDimension = !0, this.setOptions(c), this.__skipDimension = !1, this.setText(a)
        },
        setText: function(a) {
            if (this.letters) {
                for (; 0 !== a.length && this.letters.size() >= a.length;) this.letters.remove(this.letters.item(this.letters.size() - 1));
                for (var c = 0; c < a.length; c++) void 0 === this.letters.item(c) ? this.letters.add(new b.Text(a[c])) : this.letters.item(c).setText(a[c])
            }
            this.callSuper("setText", a)
        },
        _render: function() {
            var a = b.util.getRandomInt(100, 999);
            if (this._isRendering = a, this.letters) {
                var c = 0,
                    d = 0,
                    e = 0,
                    f = 0,
                    g = parseInt(this.spacing),
                    h = 0;
                if ("curved" == this.effect) {
                    for (var i = 0, j = this.text.length; j > i; i++) f += this.letters.item(i).width + g;
                    f -= g
                } else "arc" == this.effect && (h = (this.letters.item(0).fontSize + g) / this.radius / (Math.PI / 180), f = (this.text.length + 1) * (this.letters.item(0).fontSize + g));
                c = "right" === this.get("textAlign") ? 90 - f / 2 / this.radius / (Math.PI / 180) : "left" === this.get("textAlign") ? -90 - f / 2 / this.radius / (Math.PI / 180) : -(f / 2 / this.radius / (Math.PI / 180)), this.reverse && (c = -c);
                for (var k = 0, l = this.reverse ? -1 : 1, m = 0, n = 0, i = 0, j = this.text.length; j > i; i++) {
                    if (a !== this._isRendering) return;
                    for (var o in this.delegatedProperties) this.letters.item(i).set(o, this.get(o));
                    if (this.letters.item(i).set("left", k), this.letters.item(i).set("top", 0), this.letters.item(i).setAngle(0), this.letters.item(i).set("padding", 0), "curved" === this.effect) m = (this.letters.item(i).width + g) / this.radius / (Math.PI / 180), d = l * (l * c + n + m / 2), c = l * (l * c + n), e = c * (Math.PI / 180), n = m, this.letters.item(i).setAngle(d), this.letters.item(i).set("top", -1 * l * Math.cos(e) * this.radius), this.letters.item(i).set("left", l * Math.sin(e) * this.radius), this.letters.item(i).set("padding", 0), this.letters.item(i).set("selectable", !1);
                    else if ("arc" === this.effect) c = l * (l * c + h), e = c * (Math.PI / 180), this.letters.item(i).set("top", -1 * l * Math.cos(e) * this.radius), this.letters.item(i).set("left", l * Math.sin(e) * this.radius), this.letters.item(i).set("padding", 0), this.letters.item(i).set("selectable", !1);
                    else if ("STRAIGHT" === this.effect) this.letters.item(i).set("left", k), this.letters.item(i).set("top", 0), this.letters.item(i).setAngle(0), k += this.letters.item(i).get("width"), this.letters.item(i).set("padding", 0), this.letters.item(i).set({
                        borderColor: "red",
                        cornerColor: "green",
                        cornerSize: 6,
                        transparentCorners: !1
                    }), this.letters.item(i).set("selectable", !1);
                    else if ("smallToLarge" === this.effect) {
                        var p = parseInt(this.smallFont),
                            q = parseInt(this.largeFont),
                            r = q - p,
                            s = Math.ceil(this.text.length / 2),
                            t = r / this.text.length,
                            u = p + i * t;
                        this.letters.item(i).set("fontSize", u), this.letters.item(i).set("left", k), k += this.letters.item(i).get("width"), this.letters.item(i).set("padding", 0), this.letters.item(i).set("selectable", !1), this.letters.item(i).set("top", -1 * this.letters.item(i).get("fontSize") + i)
                    } else if ("largeToSmallTop" === this.effect) {
                        var p = parseInt(this.largeFont),
                            q = parseInt(this.smallFont),
                            r = q - p,
                            s = Math.ceil(this.text.length / 2),
                            t = r / this.text.length,
                            u = p + i * t;
                        this.letters.item(i).set("fontSize", u), this.letters.item(i).set("left", k), k += this.letters.item(i).get("width"), this.letters.item(i).set("padding", 0), this.letters.item(i).set({
                            borderColor: "red",
                            cornerColor: "green",
                            cornerSize: 6,
                            transparentCorners: !1
                        }), this.letters.item(i).set("padding", 0), this.letters.item(i).set("selectable", !1), this.letters.item(i).top = -1 * this.letters.item(i).get("fontSize") + i / this.text.length
                    } else if ("largeToSmallBottom" === this.effect) {
                        var p = parseInt(this.largeFont),
                            q = parseInt(this.smallFont),
                            r = q - p,
                            s = Math.ceil(this.text.length / 2),
                            t = r / this.text.length,
                            u = p + i * t;
                        this.letters.item(i).set("fontSize", u), this.letters.item(i).set("left", k), k += this.letters.item(i).get("width"), this.letters.item(i).set("padding", 0), this.letters.item(i).set({
                            borderColor: "red",
                            cornerColor: "green",
                            cornerSize: 6,
                            transparentCorners: !1
                        }), this.letters.item(i).set("padding", 0), this.letters.item(i).set("selectable", !1), this.letters.item(i).top = -1 * this.letters.item(i).get("fontSize") - i
                    } else if ("bulge" === this.effect) {
                        var p = parseInt(this.smallFont),
                            q = parseInt(this.largeFont),
                            r = q - p,
                            s = Math.ceil(this.text.length / 2),
                            t = r / (this.text.length - s);
                        if (s > i) var u = p + i * t;
                        else var u = q - (i - s + 1) * t;
                        this.letters.item(i).set("fontSize", u), this.letters.item(i).set("left", k), k += this.letters.item(i).get("width"), this.letters.item(i).set("padding", 0), this.letters.item(i).set("selectable", !1), this.letters.item(i).set("top", -1 * this.letters.item(i).get("height") / 2)
                    }
                }
                this.letters._calcBounds(), this.letters._updateObjectsCoords(), this.letters.saveCoords(), this.width = this.letters.width, this.height = this.letters.height, this.letters.left = -(this.letters.width / 2), this.letters.top = -(this.letters.height / 2)
            }
        },
        _renderOld: function() {
            if (this.letters) {
                var a = 0,
                    b = 0,
                    c = 0;
                "center" === this.get("textAlign") || "justify" === this.get("textAlign") ? c = this.spacing / 2 * (this.text.length - 1) : "right" === this.get("textAlign") && (c = this.spacing * (this.text.length - 1));
                for (var d = this.reverse ? 1 : -1, e = 0, f = this.text.length; f > e; e++) {
                    a = d * (-e * parseInt(this.spacing, 10) + c), b = a * (Math.PI / 180);
                    for (var g in this.delegatedProperties) this.letters.item(e).set(g, this.get(g));
                    this.letters.item(e).set("top", -Math.cos(b) * this.radius), this.letters.item(e).set("left", +Math.sin(b) * this.radius), this.letters.item(e).setAngle(a), this.letters.item(e).set("padding", 0), this.letters.item(e).set("selectable", !1)
                }
                this.letters._calcBounds(), this.letters._updateObjectsCoords(), this.letters.saveCoords(), this.width = this.letters.width, this.height = this.letters.height, this.letters.left = -(this.letters.width / 2), this.letters.top = -(this.letters.height / 2)
            }
        },
        render: function(a) {
            if (this.visible && this.letters) {
                this.transform(a); {
                    Math.max(this.scaleX, this.scaleY)
                }
                this.clipTo && b.util.clipContext(this, a);
                for (var c = 0, d = this.letters.size(); d > c; c++) {
                    {
                        var e = this.letters.item(c);
                        e.borderScaleFactor, e.hasRotatingPoint
                    }
                    e.visible && e.render(a)
                }
                this.clipTo && a.restore(), this.setCoords()
            }
        },
        _set: function(a, b) {
            this.callSuper("_set", a, b), this.letters && a in this._dimensionAffectingProps && (this._initDimensions(), this.setCoords())
        },
        toObject: function(a) {
            var b = c(this.callSuper("toObject", a), {
                radius: this.radius,
                spacing: this.spacing,
                reverse: this.reverse,
                effect: this.effect,
                range: this.range,
                smallFont: this.smallFont,
                largeFont: this.largeFont
            });
            return this.includeDefaultValues || this._removeDefaultValues(b), b
        },
        toString: function() {
            return "#<fabric.CurvedText (" + this.complexity() + '): { "text": "' + this.text + '", "fontFamily": "' + this.fontFamily + '", "radius": "' + this.radius + '", "spacing": "' + this.spacing + '", "reverse": "' + this.reverse + '" }>'
        },
        toSVG: function(a) {
            var b = ["<g ", 'transform="', this.getSvgTransform(), '">'];
            if (this.letters)
                for (var c = 0, d = this.letters.size(); d > c; c++) b.push(this.letters.item(c).toSVG(a));
            return b.push("</g>"), a ? a(b.join("")) : b.join("")
        }
    }), b.CurvedText.fromObject = function(a) {
        return new b.CurvedText(a.text, d(a))
    }, b.util.createAccessors(b.CurvedText), b.CurvedText.async = !1
}("undefined" != typeof exports ? exports : this), ! function(a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : "object" == typeof exports ? module.exports = a : a(jQuery)
}(function(a) {
    function b(b) {
        var g = b || window.event,
            h = i.call(arguments, 1),
            j = 0,
            l = 0,
            m = 0,
            n = 0,
            o = 0,
            p = 0;
        if (b = a.event.fix(g), b.type = "mousewheel", "detail" in g && (m = -1 * g.detail), "wheelDelta" in g && (m = g.wheelDelta), "wheelDeltaY" in g && (m = g.wheelDeltaY), "wheelDeltaX" in g && (l = -1 * g.wheelDeltaX), "axis" in g && g.axis === g.HORIZONTAL_AXIS && (l = -1 * m, m = 0), j = 0 === m ? l : m, "deltaY" in g && (m = -1 * g.deltaY, j = m), "deltaX" in g && (l = g.deltaX, 0 === m && (j = -1 * l)), 0 !== m || 0 !== l) {
            if (1 === g.deltaMode) {
                var q = a.data(this, "mousewheel-line-height");
                j *= q, m *= q, l *= q
            } else if (2 === g.deltaMode) {
                var r = a.data(this, "mousewheel-page-height");
                j *= r, m *= r, l *= r
            }
            if (n = Math.max(Math.abs(m), Math.abs(l)), (!f || f > n) && (f = n, d(g, n) && (f /= 40)), d(g, n) && (j /= 40, l /= 40, m /= 40), j = Math[j >= 1 ? "floor" : "ceil"](j / f), l = Math[l >= 1 ? "floor" : "ceil"](l / f), m = Math[m >= 1 ? "floor" : "ceil"](m / f), k.settings.normalizeOffset && this.getBoundingClientRect) {
                var s = this.getBoundingClientRect();
                o = b.clientX - s.left, p = b.clientY - s.top
            }
            return b.deltaX = l, b.deltaY = m, b.deltaFactor = f, b.offsetX = o, b.offsetY = p, b.deltaMode = 0, h.unshift(b, j, l, m), e && clearTimeout(e), e = setTimeout(c, 200), (a.event.dispatch || a.event.handle).apply(this, h)
        }
    }

    function c() {
        f = null
    }

    function d(a, b) {
        return k.settings.adjustOldDeltas && "mousewheel" === a.type && b % 120 === 0
    }
    var e, f, g = ["wheel", "mousewheel", "DOMMouseScroll", "MozMousePixelScroll"],
        h = "onwheel" in document || document.documentMode >= 9 ? ["wheel"] : ["mousewheel", "DomMouseScroll", "MozMousePixelScroll"],
        i = Array.prototype.slice;
    if (a.event.fixHooks)
        for (var j = g.length; j;) a.event.fixHooks[g[--j]] = a.event.mouseHooks;
    var k = a.event.special.mousewheel = {
        version: "3.1.12",
        setup: function() {
            if (this.addEventListener)
                for (var c = h.length; c;) this.addEventListener(h[--c], b, !1);
            else this.onmousewheel = b;
            a.data(this, "mousewheel-line-height", k.getLineHeight(this)), a.data(this, "mousewheel-page-height", k.getPageHeight(this))
        },
        teardown: function() {
            if (this.removeEventListener)
                for (var c = h.length; c;) this.removeEventListener(h[--c], b, !1);
            else this.onmousewheel = null;
            a.removeData(this, "mousewheel-line-height"), a.removeData(this, "mousewheel-page-height")
        },
        getLineHeight: function(b) {
            var c = a(b),
                d = c["offsetParent" in a.fn ? "offsetParent" : "parent"]();
            return d.length || (d = a("body")), parseInt(d.css("fontSize"), 10) || parseInt(c.css("fontSize"), 10) || 16
        },
        getPageHeight: function(b) {
            return a(b).height()
        },
        settings: {
            adjustOldDeltas: !0,
            normalizeOffset: !0
        }
    };
    a.fn.extend({
        mousewheel: function(a) {
            return a ? this.bind("mousewheel", a) : this.trigger("mousewheel")
        },
        unmousewheel: function(a) {
            return this.unbind("mousewheel", a)
        }
    })
}), ! function(a, b, c) {
    ! function(b) {
        var d = "function" == typeof define && define.amd,
            e = "https:" == c.location.protocol ? "https:" : "http:",
            f = "cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.12/jquery.mousewheel.min.js";
        d || a.event.special.mousewheel || a("head").append(decodeURI("%3Cscript src=" + e + "//" + f + "%3E%3C/script%3E")), b()
    }(function() {
        var d, e = "mCustomScrollbar",
            f = "mCS",
            g = ".mCustomScrollbar",
            h = {
                setTop: 0,
                setLeft: 0,
                axis: "y",
                scrollbarPosition: "inside",
                scrollInertia: 950,
                autoDraggerLength: !0,
                alwaysShowScrollbar: 0,
                snapOffset: 0,
                mouseWheel: {
                    enable: !0,
                    scrollAmount: "auto",
                    axis: "y",
                    deltaFactor: "auto",
                    disableOver: ["select", "option", "keygen", "datalist", "textarea"]
                },
                scrollButtons: {
                    scrollType: "stepless",
                    scrollAmount: "auto"
                },
                keyboard: {
                    enable: !0,
                    scrollType: "stepless",
                    scrollAmount: "auto"
                },
                contentTouchScroll: 25,
                advanced: {
                    autoScrollOnFocus: "input,textarea,select,button,datalist,keygen,a[tabindex],area,object,[contenteditable='true']",
                    updateOnContentResize: !0,
                    updateOnImageLoad: !0
                },
                theme: "light",
                callbacks: {
                    onTotalScrollOffset: 0,
                    onTotalScrollBackOffset: 0,
                    alwaysTriggerOffsets: !0
                }
            }, i = 0,
            j = {}, k = b.attachEvent && !b.addEventListener ? 1 : 0,
            l = !1,
            m = ["mCSB_dragger_onDrag", "mCSB_scrollTools_onDrag", "mCS_img_loaded", "mCS_disabled", "mCS_destroyed", "mCS_no_scrollbar", "mCS-autoHide", "mCS-dir-rtl", "mCS_no_scrollbar_y", "mCS_no_scrollbar_x", "mCS_y_hidden", "mCS_x_hidden", "mCSB_draggerContainer", "mCSB_buttonUp", "mCSB_buttonDown", "mCSB_buttonLeft", "mCSB_buttonRight"],
            n = {
                init: function(b) {
                    var b = a.extend(!0, {}, h, b),
                        c = o.call(this);
                    if (b.live) {
                        var d = b.liveSelector || this.selector || g,
                            e = a(d);
                        if ("off" === b.live) return void q(d);
                        j[d] = setTimeout(function() {
                            e.mCustomScrollbar(b), "once" === b.live && e.length && q(d)
                        }, 500)
                    } else q(d);
                    return b.setWidth = b.set_width ? b.set_width : b.setWidth, b.setHeight = b.set_height ? b.set_height : b.setHeight, b.axis = b.horizontalScroll ? "x" : r(b.axis), b.scrollInertia = b.scrollInertia > 0 && b.scrollInertia < 17 ? 17 : b.scrollInertia, "object" != typeof b.mouseWheel && 1 == b.mouseWheel && (b.mouseWheel = {
                        enable: !0,
                        scrollAmount: "auto",
                        axis: "y",
                        preventDefault: !1,
                        deltaFactor: "auto",
                        normalizeDelta: !1,
                        invert: !1
                    }), b.mouseWheel.scrollAmount = b.mouseWheelPixels ? b.mouseWheelPixels : b.mouseWheel.scrollAmount, b.mouseWheel.normalizeDelta = b.advanced.normalizeMouseWheelDelta ? b.advanced.normalizeMouseWheelDelta : b.mouseWheel.normalizeDelta, b.scrollButtons.scrollType = s(b.scrollButtons.scrollType), p(b), a(c).each(function() {
                        var c = a(this);
                        if (!c.data(f)) {
                            c.data(f, {
                                idx: ++i,
                                opt: b,
                                scrollRatio: {
                                    y: null,
                                    x: null
                                },
                                overflowed: null,
                                contentReset: {
                                    y: null,
                                    x: null
                                },
                                bindEvents: !1,
                                tweenRunning: !1,
                                sequential: {},
                                langDir: c.css("direction"),
                                cbOffsets: null,
                                trigger: null
                            });
                            var d = c.data(f),
                                e = d.opt,
                                g = c.data("mcs-axis"),
                                h = c.data("mcs-scrollbar-position"),
                                j = c.data("mcs-theme");
                            g && (e.axis = g), h && (e.scrollbarPosition = h), j && (e.theme = j, p(e)), t.call(this), a("#mCSB_" + d.idx + "_container img:not(." + m[2] + ")").addClass(m[2]), n.update.call(null, c)
                        }
                    })
                },
                update: function(b, c) {
                    var d = b || o.call(this);
                    return a(d).each(function() {
                        var b = a(this);
                        if (b.data(f)) {
                            var d = b.data(f),
                                e = d.opt,
                                g = a("#mCSB_" + d.idx + "_container"),
                                h = [a("#mCSB_" + d.idx + "_dragger_vertical"), a("#mCSB_" + d.idx + "_dragger_horizontal")];
                            if (!g.length) return;
                            d.tweenRunning && W(b), b.hasClass(m[3]) && b.removeClass(m[3]), b.hasClass(m[4]) && b.removeClass(m[4]), x.call(this), v.call(this), "y" === e.axis || e.advanced.autoExpandHorizontalScroll || g.css("width", u(g.children())), d.overflowed = B.call(this), F.call(this), e.autoDraggerLength && y.call(this), z.call(this), D.call(this);
                            var i = [Math.abs(g[0].offsetTop), Math.abs(g[0].offsetLeft)];
                            "x" !== e.axis && (d.overflowed[0] ? h[0].height() > h[0].parent().height() ? C.call(this) : (X(b, i[0].toString(), {
                                dir: "y",
                                dur: 0,
                                overwrite: "none"
                            }), d.contentReset.y = null) : (C.call(this), "y" === e.axis ? E.call(this) : "yx" === e.axis && d.overflowed[1] && X(b, i[1].toString(), {
                                dir: "x",
                                dur: 0,
                                overwrite: "none"
                            }))), "y" !== e.axis && (d.overflowed[1] ? h[1].width() > h[1].parent().width() ? C.call(this) : (X(b, i[1].toString(), {
                                dir: "x",
                                dur: 0,
                                overwrite: "none"
                            }), d.contentReset.x = null) : (C.call(this), "x" === e.axis ? E.call(this) : "yx" === e.axis && d.overflowed[0] && X(b, i[0].toString(), {
                                dir: "y",
                                dur: 0,
                                overwrite: "none"
                            }))), c && d && (2 === c && e.callbacks.onImageLoad && "function" == typeof e.callbacks.onImageLoad ? e.callbacks.onImageLoad.call(this) : 3 === c && e.callbacks.onSelectorChange && "function" == typeof e.callbacks.onSelectorChange ? e.callbacks.onSelectorChange.call(this) : e.callbacks.onUpdate && "function" == typeof e.callbacks.onUpdate && e.callbacks.onUpdate.call(this)), U.call(this)
                        }
                    })
                },
                scrollTo: function(b, c) {
                    if ("undefined" != typeof b && null != b) {
                        var d = o.call(this);
                        return a(d).each(function() {
                            var d = a(this);
                            if (d.data(f)) {
                                var e = d.data(f),
                                    g = e.opt,
                                    h = {
                                        trigger: "external",
                                        scrollInertia: g.scrollInertia,
                                        scrollEasing: "mcsEaseInOut",
                                        moveDragger: !1,
                                        timeout: 60,
                                        callbacks: !0,
                                        onStart: !0,
                                        onUpdate: !0,
                                        onComplete: !0
                                    }, i = a.extend(!0, {}, h, c),
                                    j = S.call(this, b),
                                    k = i.scrollInertia > 0 && i.scrollInertia < 17 ? 17 : i.scrollInertia;
                                j[0] = T.call(this, j[0], "y"), j[1] = T.call(this, j[1], "x"), i.moveDragger && (j[0] *= e.scrollRatio.y, j[1] *= e.scrollRatio.x), i.dur = k, setTimeout(function() {
                                    null !== j[0] && "undefined" != typeof j[0] && "x" !== g.axis && e.overflowed[0] && (i.dir = "y", i.overwrite = "all", X(d, j[0].toString(), i)), null !== j[1] && "undefined" != typeof j[1] && "y" !== g.axis && e.overflowed[1] && (i.dir = "x", i.overwrite = "none", X(d, j[1].toString(), i))
                                }, i.timeout)
                            }
                        })
                    }
                },
                stop: function() {
                    var b = o.call(this);
                    return a(b).each(function() {
                        var b = a(this);
                        b.data(f) && W(b)
                    })
                },
                disable: function(b) {
                    var c = o.call(this);
                    return a(c).each(function() {
                        var c = a(this);
                        c.data(f) && (c.data(f), U.call(this, "remove"), E.call(this), b && C.call(this), F.call(this, !0), c.addClass(m[3]))
                    })
                },
                destroy: function() {
                    var b = o.call(this);
                    return a(b).each(function() {
                        var c = a(this);
                        if (c.data(f)) {
                            var d = c.data(f),
                                g = d.opt,
                                h = a("#mCSB_" + d.idx),
                                i = a("#mCSB_" + d.idx + "_container"),
                                j = a(".mCSB_" + d.idx + "_scrollbar");
                            g.live && q(g.liveSelector || a(b).selector), U.call(this, "remove"), E.call(this), C.call(this), c.removeData(f), _(this, "mcs"), j.remove(), i.find("img." + m[2]).removeClass(m[2]), h.replaceWith(i.contents()), c.removeClass(e + " _" + f + "_" + d.idx + " " + m[6] + " " + m[7] + " " + m[5] + " " + m[3]).addClass(m[4])
                        }
                    })
                }
            }, o = function() {
                return "object" != typeof a(this) || a(this).length < 1 ? g : this
            }, p = function(b) {
                var c = ["rounded", "rounded-dark", "rounded-dots", "rounded-dots-dark"],
                    d = ["rounded-dots", "rounded-dots-dark", "3d", "3d-dark", "3d-thick", "3d-thick-dark", "inset", "inset-dark", "inset-2", "inset-2-dark", "inset-3", "inset-3-dark"],
                    e = ["minimal", "minimal-dark"],
                    f = ["minimal", "minimal-dark"],
                    g = ["minimal", "minimal-dark"];
                b.autoDraggerLength = a.inArray(b.theme, c) > -1 ? !1 : b.autoDraggerLength, b.autoExpandScrollbar = a.inArray(b.theme, d) > -1 ? !1 : b.autoExpandScrollbar, b.scrollButtons.enable = a.inArray(b.theme, e) > -1 ? !1 : b.scrollButtons.enable, b.autoHideScrollbar = a.inArray(b.theme, f) > -1 ? !0 : b.autoHideScrollbar, b.scrollbarPosition = a.inArray(b.theme, g) > -1 ? "outside" : b.scrollbarPosition
            }, q = function(a) {
                j[a] && (clearTimeout(j[a]), _(j, a))
            }, r = function(a) {
                return "yx" === a || "xy" === a || "auto" === a ? "yx" : "x" === a || "horizontal" === a ? "x" : "y"
            }, s = function(a) {
                return "stepped" === a || "pixels" === a || "step" === a || "click" === a ? "stepped" : "stepless"
            }, t = function() {
                var b = a(this),
                    c = b.data(f),
                    d = c.opt,
                    g = d.autoExpandScrollbar ? " " + m[1] + "_expand" : "",
                    h = ["<div id='mCSB_" + c.idx + "_scrollbar_vertical' class='mCSB_scrollTools mCSB_" + c.idx + "_scrollbar mCS-" + d.theme + " mCSB_scrollTools_vertical" + g + "'><div class='" + m[12] + "'><div id='mCSB_" + c.idx + "_dragger_vertical' class='mCSB_dragger' style='position:absolute;' oncontextmenu='return false;'><div class='mCSB_dragger_bar' /></div><div class='mCSB_draggerRail' /></div></div>", "<div id='mCSB_" + c.idx + "_scrollbar_horizontal' class='mCSB_scrollTools mCSB_" + c.idx + "_scrollbar mCS-" + d.theme + " mCSB_scrollTools_horizontal" + g + "'><div class='" + m[12] + "'><div id='mCSB_" + c.idx + "_dragger_horizontal' class='mCSB_dragger' style='position:absolute;' oncontextmenu='return false;'><div class='mCSB_dragger_bar' /></div><div class='mCSB_draggerRail' /></div></div>"],
                    i = "yx" === d.axis ? "mCSB_vertical_horizontal" : "x" === d.axis ? "mCSB_horizontal" : "mCSB_vertical",
                    j = "yx" === d.axis ? h[0] + h[1] : "x" === d.axis ? h[1] : h[0],
                    k = "yx" === d.axis ? "<div id='mCSB_" + c.idx + "_container_wrapper' class='mCSB_container_wrapper' />" : "",
                    l = d.autoHideScrollbar ? " " + m[6] : "",
                    n = "x" !== d.axis && "rtl" === c.langDir ? " " + m[7] : "";
                d.setWidth && b.css("width", d.setWidth), d.setHeight && b.css("height", d.setHeight), d.setLeft = "y" !== d.axis && "rtl" === c.langDir ? "989999px" : d.setLeft, b.addClass(e + " _" + f + "_" + c.idx + l + n).wrapInner("<div id='mCSB_" + c.idx + "' class='mCustomScrollBox mCS-" + d.theme + " " + i + "'><div id='mCSB_" + c.idx + "_container' class='mCSB_container' style='position:relative; top:" + d.setTop + "; left:" + d.setLeft + ";' dir=" + c.langDir + " /></div>");
                var o = a("#mCSB_" + c.idx),
                    p = a("#mCSB_" + c.idx + "_container");
                "y" === d.axis || d.advanced.autoExpandHorizontalScroll || p.css("width", u(p.children())), "outside" === d.scrollbarPosition ? ("static" === b.css("position") && b.css("position", "relative"), b.css("overflow", "visible"), o.addClass("mCSB_outside").after(j)) : (o.addClass("mCSB_inside").append(j), p.wrap(k)), w.call(this);
                var q = [a("#mCSB_" + c.idx + "_dragger_vertical"), a("#mCSB_" + c.idx + "_dragger_horizontal")];
                q[0].css("min-height", q[0].height()), q[1].css("min-width", q[1].width())
            }, u = function(b) {
                return Math.max.apply(Math, b.map(function() {
                    return a(this).outerWidth(!0)
                }).get())
            }, v = function() {
                var b = a(this),
                    c = b.data(f),
                    d = c.opt,
                    e = a("#mCSB_" + c.idx + "_container");
                d.advanced.autoExpandHorizontalScroll && "y" !== d.axis && e.css({
                    position: "absolute",
                    width: "auto"
                }).wrap("<div class='mCSB_h_wrapper' style='position:relative; left:0; width:999999px;' />").css({
                    width: Math.ceil(e[0].getBoundingClientRect().right + .4) - Math.floor(e[0].getBoundingClientRect().left),
                    position: "relative"
                }).unwrap()
            }, w = function() {
                var b = a(this),
                    c = b.data(f),
                    d = c.opt,
                    e = a(".mCSB_" + c.idx + "_scrollbar:first"),
                    g = ca(d.scrollButtons.tabindex) ? "tabindex='" + d.scrollButtons.tabindex + "'" : "",
                    h = ["<a href='#' class='" + m[13] + "' oncontextmenu='return false;' " + g + " />", "<a href='#' class='" + m[14] + "' oncontextmenu='return false;' " + g + " />", "<a href='#' class='" + m[15] + "' oncontextmenu='return false;' " + g + " />", "<a href='#' class='" + m[16] + "' oncontextmenu='return false;' " + g + " />"],
                    i = ["x" === d.axis ? h[2] : h[0], "x" === d.axis ? h[3] : h[1], h[2], h[3]];

                d.scrollButtons.enable && e.prepend(i[0]).append(i[1]).next(".mCSB_scrollTools").prepend(i[2]).append(i[3])
            }, x = function() {
                var b = a(this),
                    c = b.data(f),
                    d = a("#mCSB_" + c.idx),
                    e = b.css("max-height") || "none",
                    g = -1 !== e.indexOf("%"),
                    h = b.css("box-sizing");
                if ("none" !== e) {
                    var i = g ? b.parent().height() * parseInt(e) / 100 : parseInt(e);
                    "border-box" === h && (i -= b.innerHeight() - b.height() + (b.outerHeight() - b.innerHeight())), d.css("max-height", Math.round(i))
                }
            }, y = function() {
                var b = a(this),
                    c = b.data(f),
                    d = a("#mCSB_" + c.idx),
                    e = a("#mCSB_" + c.idx + "_container"),
                    g = [a("#mCSB_" + c.idx + "_dragger_vertical"), a("#mCSB_" + c.idx + "_dragger_horizontal")],
                    h = [d.height() / e.outerHeight(!1), d.width() / e.outerWidth(!1)],
                    i = [parseInt(g[0].css("min-height")), Math.round(h[0] * g[0].parent().height()), parseInt(g[1].css("min-width")), Math.round(h[1] * g[1].parent().width())],
                    j = k && i[1] < i[0] ? i[0] : i[1],
                    l = k && i[3] < i[2] ? i[2] : i[3];
                g[0].css({
                    height: j,
                    "max-height": g[0].parent().height() - 10
                }).find(".mCSB_dragger_bar").css({
                    "line-height": i[0] + "px"
                }), g[1].css({
                    width: l,
                    "max-width": g[1].parent().width() - 10
                })
            }, z = function() {
                var b = a(this),
                    c = b.data(f),
                    d = a("#mCSB_" + c.idx),
                    e = a("#mCSB_" + c.idx + "_container"),
                    g = [a("#mCSB_" + c.idx + "_dragger_vertical"), a("#mCSB_" + c.idx + "_dragger_horizontal")],
                    h = [e.outerHeight(!1) - d.height(), e.outerWidth(!1) - d.width()],
                    i = [h[0] / (g[0].parent().height() - g[0].height()), h[1] / (g[1].parent().width() - g[1].width())];
                c.scrollRatio = {
                    y: i[0],
                    x: i[1]
                }
            }, A = function(a, b, c) {
                var d = c ? m[0] + "_expanded" : "",
                    e = a.closest(".mCSB_scrollTools");
                "active" === b ? (a.toggleClass(m[0] + " " + d), e.toggleClass(m[1]), a[0]._draggable = a[0]._draggable ? 0 : 1) : a[0]._draggable || ("hide" === b ? (a.removeClass(m[0]), e.removeClass(m[1])) : (a.addClass(m[0]), e.addClass(m[1])))
            }, B = function() {
                var b = a(this),
                    c = b.data(f),
                    d = a("#mCSB_" + c.idx),
                    e = a("#mCSB_" + c.idx + "_container"),
                    g = null == c.overflowed ? e.height() : e.outerHeight(!1),
                    h = null == c.overflowed ? e.width() : e.outerWidth(!1);
                return [g > d.height(), h > d.width()]
            }, C = function() {
                var b = a(this),
                    c = b.data(f),
                    d = c.opt,
                    e = a("#mCSB_" + c.idx),
                    g = a("#mCSB_" + c.idx + "_container"),
                    h = [a("#mCSB_" + c.idx + "_dragger_vertical"), a("#mCSB_" + c.idx + "_dragger_horizontal")];
                if (W(b), ("x" !== d.axis && !c.overflowed[0] || "y" === d.axis && c.overflowed[0]) && (h[0].add(g).css("top", 0), X(b, "_resetY")), "y" !== d.axis && !c.overflowed[1] || "x" === d.axis && c.overflowed[1]) {
                    var i = dx = 0;
                    "rtl" === c.langDir && (i = e.width() - g.outerWidth(!1), dx = Math.abs(i / c.scrollRatio.x)), g.css("left", i), h[1].css("left", dx), X(b, "_resetX")
                }
            }, D = function() {
                function b() {
                    g = setTimeout(function() {
                        a.event.special.mousewheel ? (clearTimeout(g), K.call(c[0])) : b()
                    }, 100)
                }
                var c = a(this),
                    d = c.data(f),
                    e = d.opt;
                if (!d.bindEvents) {
                    if (H.call(this), e.contentTouchScroll && I.call(this), J.call(this), e.mouseWheel.enable) {
                        var g;
                        b()
                    }
                    M.call(this), O.call(this), e.advanced.autoScrollOnFocus && N.call(this), e.scrollButtons.enable && P.call(this), e.keyboard.enable && Q.call(this), d.bindEvents = !0
                }
            }, E = function() {
                var b = a(this),
                    d = b.data(f),
                    e = d.opt,
                    g = f + "_" + d.idx,
                    h = ".mCSB_" + d.idx + "_scrollbar",
                    i = a("#mCSB_" + d.idx + ",#mCSB_" + d.idx + "_container,#mCSB_" + d.idx + "_container_wrapper," + h + " ." + m[12] + ",#mCSB_" + d.idx + "_dragger_vertical,#mCSB_" + d.idx + "_dragger_horizontal," + h + ">a"),
                    j = a("#mCSB_" + d.idx + "_container");
                e.advanced.releaseDraggableSelectors && i.add(a(e.advanced.releaseDraggableSelectors)), d.bindEvents && (a(c).unbind("." + g), i.each(function() {
                    a(this).unbind("." + g)
                }), clearTimeout(b[0]._focusTimeout), _(b[0], "_focusTimeout"), clearTimeout(d.sequential.step), _(d.sequential, "step"), clearTimeout(j[0].onCompleteTimeout), _(j[0], "onCompleteTimeout"), d.bindEvents = !1)
            }, F = function(b) {
                var c = a(this),
                    d = c.data(f),
                    e = d.opt,
                    g = a("#mCSB_" + d.idx + "_container_wrapper"),
                    h = g.length ? g : a("#mCSB_" + d.idx + "_container"),
                    i = [a("#mCSB_" + d.idx + "_scrollbar_vertical"), a("#mCSB_" + d.idx + "_scrollbar_horizontal")],
                    j = [i[0].find(".mCSB_dragger"), i[1].find(".mCSB_dragger")];
                "x" !== e.axis && (d.overflowed[0] && !b ? (i[0].add(j[0]).add(i[0].children("a")).css("display", "block"), h.removeClass(m[8] + " " + m[10])) : (e.alwaysShowScrollbar ? (2 !== e.alwaysShowScrollbar && j[0].css("display", "none"), h.removeClass(m[10])) : (i[0].css("display", "none"), h.addClass(m[10])), h.addClass(m[8]))), "y" !== e.axis && (d.overflowed[1] && !b ? (i[1].add(j[1]).add(i[1].children("a")).css("display", "block"), h.removeClass(m[9] + " " + m[11])) : (e.alwaysShowScrollbar ? (2 !== e.alwaysShowScrollbar && j[1].css("display", "none"), h.removeClass(m[11])) : (i[1].css("display", "none"), h.addClass(m[11])), h.addClass(m[9]))), d.overflowed[0] || d.overflowed[1] ? c.removeClass(m[5]) : c.addClass(m[5])
            }, G = function(a) {
                var b = a.type;
                switch (b) {
                    case "pointerdown":
                    case "MSPointerDown":
                    case "pointermove":
                    case "MSPointerMove":
                    case "pointerup":
                    case "MSPointerUp":
                        return [a.originalEvent.pageY, a.originalEvent.pageX, !1];
                    case "touchstart":
                    case "touchmove":
                    case "touchend":
                        var c = a.originalEvent.touches[0] || a.originalEvent.changedTouches[0],
                            d = a.originalEvent.touches.length || a.originalEvent.changedTouches.length;
                        return [c.pageY, c.pageX, d > 1];
                    default:
                        return [a.pageY, a.pageX, !1]
                }
            }, H = function() {
                function b(a) {
                    var b = p.find("iframe");
                    if (b.length) {
                        var c = a ? "auto" : "none";
                        b.css("pointer-events", c)
                    }
                }

                function d(a, b, c, d) {
                    if (p[0].idleTimer = m.scrollInertia < 233 ? 250 : 0, e.attr("id") === o[1]) var f = "x",
                    g = (e[0].offsetLeft - b + d) * j.scrollRatio.x;
                    else var f = "y",
                    g = (e[0].offsetTop - a + c) * j.scrollRatio.y;
                    X(i, g.toString(), {
                        dir: f,
                        drag: !0
                    })
                }
                var e, g, h, i = a(this),
                    j = i.data(f),
                    m = j.opt,
                    n = f + "_" + j.idx,
                    o = ["mCSB_" + j.idx + "_dragger_vertical", "mCSB_" + j.idx + "_dragger_horizontal"],
                    p = a("#mCSB_" + j.idx + "_container"),
                    q = a("#" + o[0] + ",#" + o[1]),
                    r = m.advanced.releaseDraggableSelectors ? q.add(a(m.advanced.releaseDraggableSelectors)) : q;
                q.bind("mousedown." + n + " touchstart." + n + " pointerdown." + n + " MSPointerDown." + n, function(d) {
                    if (d.stopImmediatePropagation(), d.preventDefault(), aa(d)) {
                        l = !0, k && (c.onselectstart = function() {
                            return !1
                        }), b(!1), W(i), e = a(this);
                        var f = e.offset(),
                            j = G(d)[0] - f.top,
                            n = G(d)[1] - f.left,
                            o = e.height() + f.top,
                            p = e.width() + f.left;
                        o > j && j > 0 && p > n && n > 0 && (g = j, h = n), A(e, "active", m.autoExpandScrollbar)
                    }
                }).bind("touchmove." + n, function(a) {
                    a.stopImmediatePropagation(), a.preventDefault();
                    var b = e.offset(),
                        c = G(a)[0] - b.top,
                        f = G(a)[1] - b.left;
                    d(g, h, c, f)
                }), a(c).bind("mousemove." + n + " pointermove." + n + " MSPointerMove." + n, function(a) {
                    if (e) {
                        var b = e.offset(),
                            c = G(a)[0] - b.top,
                            f = G(a)[1] - b.left;
                        if (g === c) return;
                        d(g, h, c, f)
                    }
                }).add(r).bind("mouseup." + n + " touchend." + n + " pointerup." + n + " MSPointerUp." + n, function() {
                    e && (A(e, "active", m.autoExpandScrollbar), e = null), l = !1, k && (c.onselectstart = null), b(!0)
                })
            }, I = function() {
                function b(a, b) {
                    var c = [1.5 * b, 2 * b, b / 1.5, b / 2];
                    return a > 90 ? b > 4 ? c[0] : c[3] : a > 60 ? b > 3 ? c[3] : c[2] : a > 30 ? b > 8 ? c[1] : b > 6 ? c[0] : b > 4 ? b : c[2] : b > 8 ? b : c[3]
                }

                function c(a, b, c, d, e, f) {
                    a && X(t, a.toString(), {
                        dur: b,
                        scrollEasing: c,
                        dir: d,
                        overwrite: e,
                        drag: f
                    })
                }
                var e, g, h, i, j, k, m, n, o, p, q, r, s, t = a(this),
                    u = t.data(f),
                    v = u.opt,
                    w = f + "_" + u.idx,
                    x = a("#mCSB_" + u.idx),
                    y = a("#mCSB_" + u.idx + "_container"),
                    z = [a("#mCSB_" + u.idx + "_dragger_vertical"), a("#mCSB_" + u.idx + "_dragger_horizontal")],
                    A = [],
                    B = [],
                    C = 0,
                    D = "yx" === v.axis ? "none" : "all",
                    E = [];
                y.bind("touchstart." + w + " pointerdown." + w + " MSPointerDown." + w, function(a) {
                    if (!ba(a) || l || G(a)[2]) return void(d = 0);
                    d = 1, r = 0, s = 0;
                    var b = y.offset();
                    e = G(a)[0] - b.top, g = G(a)[1] - b.left, E = [G(a)[0], G(a)[1]]
                }).bind("touchmove." + w + " pointermove." + w + " MSPointerMove." + w, function(a) {
                    if (ba(a) && !l && !G(a)[2] && (a.stopImmediatePropagation(), !s || r)) {
                        k = Z();
                        var b = x.offset(),
                            d = G(a)[0] - b.top,
                            f = G(a)[1] - b.left,
                            h = "mcsLinearOut";
                        if (A.push(d), B.push(f), E[2] = Math.abs(G(a)[0] - E[0]), E[3] = Math.abs(G(a)[1] - E[1]), u.overflowed[0]) var i = z[0].parent().height() - z[0].height(),
                        j = e - d > 0 && d - e > -(i * u.scrollRatio.y) && (2 * E[3] < E[2] || "yx" === v.axis);
                        if (u.overflowed[1]) var m = z[1].parent().width() - z[1].width(),
                        n = g - f > 0 && f - g > -(m * u.scrollRatio.x) && (2 * E[2] < E[3] || "yx" === v.axis);
                        j || n ? (a.preventDefault(), r = 1) : s = 1, p = "yx" === v.axis ? [e - d, g - f] : "x" === v.axis ? [null, g - f] : [e - d, null], y[0].idleTimer = 250, u.overflowed[0] && c(p[0], C, h, "y", "all", !0), u.overflowed[1] && c(p[1], C, h, "x", D, !0)
                    }
                }), x.bind("touchstart." + w + " pointerdown." + w + " MSPointerDown." + w, function(a) {
                    if (!ba(a) || l || G(a)[2]) return void(d = 0);
                    d = 1, a.stopImmediatePropagation(), W(t), j = Z();
                    var b = x.offset();
                    h = G(a)[0] - b.top, i = G(a)[1] - b.left, A = [], B = []
                }).bind("touchend." + w + " pointerup." + w + " MSPointerUp." + w, function(a) {
                    if (ba(a) && !l && !G(a)[2]) {
                        a.stopImmediatePropagation(), r = 0, s = 0, m = Z();
                        var d = x.offset(),
                            e = G(a)[0] - d.top,
                            f = G(a)[1] - d.left;
                        if (!(m - k > 30)) {
                            o = 1e3 / (m - j);
                            var g = "mcsEaseOut",
                                t = 2.5 > o,
                                w = t ? [A[A.length - 2], B[B.length - 2]] : [0, 0];
                            n = t ? [e - w[0], f - w[1]] : [e - h, f - i];
                            var z = [Math.abs(n[0]), Math.abs(n[1])];
                            o = t ? [Math.abs(n[0] / 4), Math.abs(n[1] / 4)] : [o, o];
                            var C = [Math.abs(y[0].offsetTop) - n[0] * b(z[0] / o[0], o[0]), Math.abs(y[0].offsetLeft) - n[1] * b(z[1] / o[1], o[1])];
                            p = "yx" === v.axis ? [C[0], C[1]] : "x" === v.axis ? [null, C[1]] : [C[0], null], q = [4 * z[0] + v.scrollInertia, 4 * z[1] + v.scrollInertia];
                            var E = parseInt(v.contentTouchScroll) || 0;
                            p[0] = z[0] > E ? p[0] : 0, p[1] = z[1] > E ? p[1] : 0, u.overflowed[0] && c(p[0], q[0], g, "y", D, !1), u.overflowed[1] && c(p[1], q[1], g, "x", D, !1)
                        }
                    }
                })
            }, J = function() {
                function e() {
                    return b.getSelection ? b.getSelection().toString() : c.selection && "Control" != c.selection.type ? c.selection.createRange().text : 0
                }

                function g(a, b, c) {
                    m.type = c && h ? "stepped" : "stepless", m.scrollAmount = 10, R(i, a, b, "mcsLinearOut", c ? 60 : null)
                }
                var h, i = a(this),
                    j = i.data(f),
                    k = j.opt,
                    m = j.sequential,
                    n = f + "_" + j.idx,
                    o = a("#mCSB_" + j.idx + "_container"),
                    p = o.parent();
                o.bind("mousedown." + n, function() {
                    d || h || (h = 1, l = !0)
                }).add(c).bind("mousemove." + n, function(a) {
                    if (!d && h && e()) {
                        var b = o.offset(),
                            c = G(a)[0] - b.top + o[0].offsetTop,
                            f = G(a)[1] - b.left + o[0].offsetLeft;
                        c > 0 && c < p.height() && f > 0 && f < p.width() ? m.step && g("off", null, "stepped") : ("x" !== k.axis && j.overflowed[0] && (0 > c ? g("on", 38) : c > p.height() && g("on", 40)), "y" !== k.axis && j.overflowed[1] && (0 > f ? g("on", 37) : f > p.width() && g("on", 39)))
                    }
                }).bind("mouseup." + n, function() {
                    d || (h && (h = 0, g("off", null)), l = !1)
                })
            }, K = function() {
                function b(a) {
                    var b = null;
                    try {
                        var c = a.contentDocument || a.contentWindow.document;
                        b = c.body.innerHTML
                    } catch (d) {}
                    return null !== b
                }
                var c = a(this),
                    d = c.data(f);
                if (d) {
                    var e = d.opt,
                        g = f + "_" + d.idx,
                        h = a("#mCSB_" + d.idx),
                        i = [a("#mCSB_" + d.idx + "_dragger_vertical"), a("#mCSB_" + d.idx + "_dragger_horizontal")],
                        j = a("#mCSB_" + d.idx + "_container").find("iframe"),
                        l = h;
                    j.length && j.each(function() {
                        var c = this;
                        b(c) && (l = l.add(a(c).contents().find("body")))
                    }), l.bind("mousewheel." + g, function(b, f) {
                        if (W(c), !L(c, b.target)) {
                            var g = "auto" !== e.mouseWheel.deltaFactor ? parseInt(e.mouseWheel.deltaFactor) : k && b.deltaFactor < 100 ? 100 : b.deltaFactor || 100;
                            if ("x" === e.axis || "x" === e.mouseWheel.axis) var j = "x",
                            l = [Math.round(g * d.scrollRatio.x), parseInt(e.mouseWheel.scrollAmount)], m = "auto" !== e.mouseWheel.scrollAmount ? l[1] : l[0] >= h.width() ? .9 * h.width() : l[0], n = Math.abs(a("#mCSB_" + d.idx + "_container")[0].offsetLeft), o = i[1][0].offsetLeft, p = i[1].parent().width() - i[1].width(), q = b.deltaX || b.deltaY || f;
                            else var j = "y",
                            l = [Math.round(g * d.scrollRatio.y), parseInt(e.mouseWheel.scrollAmount)], m = "auto" !== e.mouseWheel.scrollAmount ? l[1] : l[0] >= h.height() ? .9 * h.height() : l[0], n = Math.abs(a("#mCSB_" + d.idx + "_container")[0].offsetTop), o = i[0][0].offsetTop, p = i[0].parent().height() - i[0].height(), q = b.deltaY || f;
                            "y" === j && !d.overflowed[0] || "x" === j && !d.overflowed[1] || (e.mouseWheel.invert && (q = -q), e.mouseWheel.normalizeDelta && (q = 0 > q ? -1 : 1), (q > 0 && 0 !== o || 0 > q && o !== p || e.mouseWheel.preventDefault) && (b.stopImmediatePropagation(), b.preventDefault()), X(c, (n - q * m).toString(), {
                                dir: j
                            }))
                        }
                    })
                }
            }, L = function(b, c) {
                var d = c.nodeName.toLowerCase(),
                    e = b.data(f).opt.mouseWheel.disableOver,
                    g = ["select", "textarea"];
                return a.inArray(d, e) > -1 && !(a.inArray(d, g) > -1 && !a(c).is(":focus"))
            }, M = function() {
                var b = a(this),
                    c = b.data(f),
                    d = f + "_" + c.idx,
                    e = a("#mCSB_" + c.idx + "_container"),
                    g = e.parent(),
                    h = a(".mCSB_" + c.idx + "_scrollbar ." + m[12]);
                h.bind("touchstart." + d + " pointerdown." + d + " MSPointerDown." + d, function() {
                    l = !0
                }).bind("touchend." + d + " pointerup." + d + " MSPointerUp." + d, function() {
                    l = !1
                }).bind("click." + d, function(d) {
                    if (a(d.target).hasClass(m[12]) || a(d.target).hasClass("mCSB_draggerRail")) {
                        W(b);
                        var f = a(this),
                            h = f.find(".mCSB_dragger");
                        if (f.parent(".mCSB_scrollTools_horizontal").length > 0) {
                            if (!c.overflowed[1]) return;
                            var i = "x",
                                j = d.pageX > h.offset().left ? -1 : 1,
                                k = Math.abs(e[0].offsetLeft) - .9 * j * g.width()
                        } else {
                            if (!c.overflowed[0]) return;
                            var i = "y",
                                j = d.pageY > h.offset().top ? -1 : 1,
                                k = Math.abs(e[0].offsetTop) - .9 * j * g.height()
                        }
                        X(b, k.toString(), {
                            dir: i,
                            scrollEasing: "mcsEaseInOut"
                        })
                    }
                })
            }, N = function() {
                var b = a(this),
                    d = b.data(f),
                    e = d.opt,
                    g = f + "_" + d.idx,
                    h = a("#mCSB_" + d.idx + "_container"),
                    i = h.parent();
                h.bind("focusin." + g, function() {
                    var d = a(c.activeElement),
                        f = h.find(".mCustomScrollBox").length,
                        g = 0;
                    d.is(e.advanced.autoScrollOnFocus) && (W(b), clearTimeout(b[0]._focusTimeout), b[0]._focusTimer = f ? (g + 17) * f : 0, b[0]._focusTimeout = setTimeout(function() {
                        var a = [da(d)[0], da(d)[1]],
                            c = [h[0].offsetTop, h[0].offsetLeft],
                            f = [c[0] + a[0] >= 0 && c[0] + a[0] < i.height() - d.outerHeight(!1), c[1] + a[1] >= 0 && c[0] + a[1] < i.width() - d.outerWidth(!1)],
                            j = "yx" !== e.axis || f[0] || f[1] ? "all" : "none";
                        "x" === e.axis || f[0] || X(b, a[0].toString(), {
                            dir: "y",
                            scrollEasing: "mcsEaseInOut",
                            overwrite: j,
                            dur: g
                        }), "y" === e.axis || f[1] || X(b, a[1].toString(), {
                            dir: "x",
                            scrollEasing: "mcsEaseInOut",
                            overwrite: j,
                            dur: g
                        })
                    }, b[0]._focusTimer))
                })
            }, O = function() {
                var b = a(this),
                    c = b.data(f),
                    d = f + "_" + c.idx,
                    e = a("#mCSB_" + c.idx + "_container").parent();
                e.bind("scroll." + d, function() {
                    (0 !== e.scrollTop() || 0 !== e.scrollLeft()) && a(".mCSB_" + c.idx + "_scrollbar").css("visibility", "hidden")
                })
            }, P = function() {
                var b = a(this),
                    c = b.data(f),
                    d = c.opt,
                    e = c.sequential,
                    g = f + "_" + c.idx,
                    h = ".mCSB_" + c.idx + "_scrollbar",
                    i = a(h + ">a");
                i.bind("mousedown." + g + " touchstart." + g + " pointerdown." + g + " MSPointerDown." + g + " mouseup." + g + " touchend." + g + " pointerup." + g + " MSPointerUp." + g + " mouseout." + g + " pointerout." + g + " MSPointerOut." + g + " click." + g, function(f) {
                    function g(a, c) {
                        e.scrollAmount = d.snapAmount || d.scrollButtons.scrollAmount, R(b, a, c)
                    }
                    if (f.preventDefault(), aa(f)) {
                        var h = a(this).attr("class");
                        switch (e.type = d.scrollButtons.scrollType, f.type) {
                            case "mousedown":
                            case "touchstart":
                            case "pointerdown":
                            case "MSPointerDown":
                                if ("stepped" === e.type) return;
                                l = !0, c.tweenRunning = !1, g("on", h);
                                break;
                            case "mouseup":
                            case "touchend":
                            case "pointerup":
                            case "MSPointerUp":
                            case "mouseout":
                            case "pointerout":
                            case "MSPointerOut":
                                if ("stepped" === e.type) return;
                                l = !1, e.dir && g("off", h);
                                break;
                            case "click":
                                if ("stepped" !== e.type || c.tweenRunning) return;
                                g("on", h)
                        }
                    }
                })
            }, Q = function() {
                var b = a(this),
                    d = b.data(f),
                    e = d.opt,
                    g = d.sequential,
                    h = f + "_" + d.idx,
                    i = a("#mCSB_" + d.idx),
                    j = a("#mCSB_" + d.idx + "_container"),
                    k = j.parent(),
                    l = "input,textarea,select,datalist,keygen,[contenteditable='true']";
                i.attr("tabindex", "0").bind("blur." + h + " keydown." + h + " keyup." + h, function(f) {
                    function h(a, c) {
                        g.type = e.keyboard.scrollType, g.scrollAmount = e.snapAmount || e.keyboard.scrollAmount, "stepped" === g.type && d.tweenRunning || R(b, a, c)
                    }
                    switch (f.type) {
                        case "blur":
                            d.tweenRunning && g.dir && h("off", null);
                            break;
                        case "keydown":
                        case "keyup":
                            var i = f.keyCode ? f.keyCode : f.which,
                                m = "on";
                            if ("x" !== e.axis && (38 === i || 40 === i) || "y" !== e.axis && (37 === i || 39 === i)) {
                                if ((38 === i || 40 === i) && !d.overflowed[0] || (37 === i || 39 === i) && !d.overflowed[1]) return;
                                "keyup" === f.type && (m = "off"), a(c.activeElement).is(l) || (f.preventDefault(), f.stopImmediatePropagation(), h(m, i))
                            } else if (33 === i || 34 === i) {
                                if ((d.overflowed[0] || d.overflowed[1]) && (f.preventDefault(), f.stopImmediatePropagation()), "keyup" === f.type) {
                                    W(b);
                                    var n = 34 === i ? -1 : 1;
                                    if ("x" === e.axis || "yx" === e.axis && d.overflowed[1] && !d.overflowed[0]) var o = "x",
                                    p = Math.abs(j[0].offsetLeft) - .9 * n * k.width();
                                    else var o = "y",
                                    p = Math.abs(j[0].offsetTop) - .9 * n * k.height();
                                    X(b, p.toString(), {
                                        dir: o,
                                        scrollEasing: "mcsEaseInOut"
                                    })
                                }
                            } else if ((35 === i || 36 === i) && !a(c.activeElement).is(l) && ((d.overflowed[0] || d.overflowed[1]) && (f.preventDefault(), f.stopImmediatePropagation()), "keyup" === f.type)) {
                                if ("x" === e.axis || "yx" === e.axis && d.overflowed[1] && !d.overflowed[0]) var o = "x",
                                p = 35 === i ? Math.abs(k.width() - j.outerWidth(!1)) : 0;
                                else var o = "y",
                                p = 35 === i ? Math.abs(k.height() - j.outerHeight(!1)) : 0;
                                X(b, p.toString(), {
                                    dir: o,
                                    scrollEasing: "mcsEaseInOut"
                                })
                            }
                    }
                })
            }, R = function(b, c, d, e, g) {
                function h(a) {
                    var c = "stepped" !== l.type,
                        d = g ? g : a ? c ? p / 1.5 : q : 1e3 / 60,
                        f = a ? c ? 7.5 : 40 : 2.5,
                        i = [Math.abs(n[0].offsetTop), Math.abs(n[0].offsetLeft)],
                        k = [j.scrollRatio.y > 10 ? 10 : j.scrollRatio.y, j.scrollRatio.x > 10 ? 10 : j.scrollRatio.x],
                        m = "x" === l.dir[0] ? i[1] + l.dir[1] * k[1] * f : i[0] + l.dir[1] * k[0] * f,
                        o = "x" === l.dir[0] ? i[1] + l.dir[1] * parseInt(l.scrollAmount) : i[0] + l.dir[1] * parseInt(l.scrollAmount),
                        r = "auto" !== l.scrollAmount ? o : m,
                        s = e ? e : a ? c ? "mcsLinearOut" : "mcsEaseInOut" : "mcsLinear",
                        t = a ? !0 : !1;
                    return a && 17 > d && (r = "x" === l.dir[0] ? i[1] : i[0]), X(b, r.toString(), {
                        dir: l.dir[0],
                        scrollEasing: s,
                        dur: d,
                        onComplete: t
                    }), a ? void(l.dir = !1) : (clearTimeout(l.step), void(l.step = setTimeout(function() {
                        h()
                    }, d)))
                }

                function i() {
                    clearTimeout(l.step), _(l, "step"), W(b)
                }
                var j = b.data(f),
                    k = j.opt,
                    l = j.sequential,
                    n = a("#mCSB_" + j.idx + "_container"),
                    o = "stepped" === l.type ? !0 : !1,
                    p = k.scrollInertia < 26 ? 26 : k.scrollInertia,
                    q = k.scrollInertia < 1 ? 17 : k.scrollInertia;
                switch (c) {
                    case "on":
                        if (l.dir = [d === m[16] || d === m[15] || 39 === d || 37 === d ? "x" : "y", d === m[13] || d === m[15] || 38 === d || 37 === d ? -1 : 1], W(b), ca(d) && "stepped" === l.type) return;
                        h(o);
                        break;
                    case "off":
                        i(), (o || j.tweenRunning && l.dir) && h(!0)
                }
            }, S = function(b) {
                var c = a(this).data(f).opt,
                    d = [];
                return "function" == typeof b && (b = b()), b instanceof Array ? d = b.length > 1 ? [b[0], b[1]] : "x" === c.axis ? [null, b[0]] : [b[0], null] : (d[0] = b.y ? b.y : b.x || "x" === c.axis ? null : b, d[1] = b.x ? b.x : b.y || "y" === c.axis ? null : b), "function" == typeof d[0] && (d[0] = d[0]()), "function" == typeof d[1] && (d[1] = d[1]()), d
            }, T = function(b, c) {
                if (null != b && "undefined" != typeof b) {
                    var d = a(this),
                        e = d.data(f),
                        g = e.opt,
                        h = a("#mCSB_" + e.idx + "_container"),
                        i = h.parent(),
                        j = typeof b;
                    c || (c = "x" === g.axis ? "x" : "y");
                    var k = "x" === c ? h.outerWidth(!1) : h.outerHeight(!1),
                        l = "x" === c ? h[0].offsetLeft : h[0].offsetTop,
                        m = "x" === c ? "left" : "top";
                    switch (j) {
                        case "function":
                            return b();
                        case "object":
                            var o = b.jquery ? b : a(b);
                            if (!o.length) return;
                            return "x" === c ? da(o)[1] : da(o)[0];
                        case "string":
                        case "number":
                            if (ca(b)) return Math.abs(b);
                            if (-1 !== b.indexOf("%")) return Math.abs(k * parseInt(b) / 100);
                            if (-1 !== b.indexOf("-=")) return Math.abs(l - parseInt(b.split("-=")[1]));
                            if (-1 !== b.indexOf("+=")) {
                                var p = l + parseInt(b.split("+=")[1]);
                                return p >= 0 ? 0 : Math.abs(p)
                            }
                            if (-1 !== b.indexOf("px") && ca(b.split("px")[0])) return Math.abs(b.split("px")[0]);
                            if ("top" === b || "left" === b) return 0;
                            if ("bottom" === b) return Math.abs(i.height() - h.outerHeight(!1));
                            if ("right" === b) return Math.abs(i.width() - h.outerWidth(!1));
                            if ("first" === b || "last" === b) {
                                var o = h.find(":" + b);
                                return "x" === c ? da(o)[1] : da(o)[0]
                            }
                            return a(b).length ? "x" === c ? da(a(b))[1] : da(a(b))[0] : (h.css(m, b), void n.update.call(null, d[0]))
                    }
                }
            }, U = function(b) {
                function c() {
                    clearTimeout(l[0].autoUpdate), l[0].autoUpdate = setTimeout(function() {
                        return k.advanced.updateOnSelectorChange && (o = g(), o !== u) ? (h(3), void(u = o)) : (k.advanced.updateOnContentResize && (p = [l.outerHeight(!1), l.outerWidth(!1), r.height(), r.width(), t()[0], t()[1]], (p[0] !== v[0] || p[1] !== v[1] || p[2] !== v[2] || p[3] !== v[3] || p[4] !== v[4] || p[5] !== v[5]) && (h(p[0] !== v[0] || p[1] !== v[1]), v = p)), k.advanced.updateOnImageLoad && (q = d(), q !== w && (l.find("img").each(function() {
                            e(this)
                        }), w = q)), void((k.advanced.updateOnSelectorChange || k.advanced.updateOnContentResize || k.advanced.updateOnImageLoad) && c()))
                    }, 60)
                }

                function d() {
                    var a = 0;
                    return k.advanced.updateOnImageLoad && (a = l.find("img").length), a
                }

                function e(b) {
                    function c(a, b) {
                        return function() {
                            return b.apply(a, arguments)
                        }
                    }

                    function d() {
                        this.onload = null, a(b).addClass(m[2]), h(2)
                    }
                    if (a(b).hasClass(m[2])) return void h();
                    var e = new Image;
                    e.onload = c(e, d), e.src = b.src
                }

                function g() {
                    k.advanced.updateOnSelectorChange === !0 && (k.advanced.updateOnSelectorChange = "*");
                    var b = 0,
                        c = l.find(k.advanced.updateOnSelectorChange);
                    return k.advanced.updateOnSelectorChange && c.length > 0 && c.each(function() {
                        b += a(this).height() + a(this).width()
                    }), b
                }

                function h(a) {
                    clearTimeout(l[0].autoUpdate), n.update.call(null, i[0], a)
                }
                var i = a(this),
                    j = i.data(f),
                    k = j.opt,
                    l = a("#mCSB_" + j.idx + "_container");
                if (b) return clearTimeout(l[0].autoUpdate), void _(l[0], "autoUpdate");
                var o, p, q, r = l.parent(),
                    s = [a("#mCSB_" + j.idx + "_scrollbar_vertical"), a("#mCSB_" + j.idx + "_scrollbar_horizontal")],
                    t = function() {
                        return [s[0].is(":visible") ? s[0].outerHeight(!0) : 0, s[1].is(":visible") ? s[1].outerWidth(!0) : 0]
                    }, u = g(),
                    v = [l.outerHeight(!1), l.outerWidth(!1), r.height(), r.width(), t()[0], t()[1]],
                    w = d();
                c()
            }, V = function(a, b, c) {
                return Math.round(a / b) * b - c
            }, W = function(b) {
                var c = b.data(f),
                    d = a("#mCSB_" + c.idx + "_container,#mCSB_" + c.idx + "_container_wrapper,#mCSB_" + c.idx + "_dragger_vertical,#mCSB_" + c.idx + "_dragger_horizontal");
                d.each(function() {
                    $.call(this)
                })
            }, X = function(b, c, d) {
                function e(a) {
                    return i && j.callbacks[a] && "function" == typeof j.callbacks[a]
                }

                function g() {
                    return [j.callbacks.alwaysTriggerOffsets || t >= u[0] + w, j.callbacks.alwaysTriggerOffsets || -x >= t]
                }

                function h() {
                    var a = [n[0].offsetTop, n[0].offsetLeft],
                        c = [r[0].offsetTop, r[0].offsetLeft],
                        e = [n.outerHeight(!1), n.outerWidth(!1)],
                        f = [m.height(), m.width()];
                    b[0].mcs = {
                        content: n,
                        top: a[0],
                        left: a[1],
                        draggerTop: c[0],
                        draggerLeft: c[1],
                        topPct: Math.round(100 * Math.abs(a[0]) / (Math.abs(e[0]) - f[0])),
                        leftPct: Math.round(100 * Math.abs(a[1]) / (Math.abs(e[1]) - f[1])),
                        direction: d.dir
                    }
                }
                var i = b.data(f),
                    j = i.opt,
                    k = {
                        trigger: "internal",
                        dir: "y",
                        scrollEasing: "mcsEaseOut",
                        drag: !1,
                        dur: j.scrollInertia,
                        overwrite: "all",
                        callbacks: !0,
                        onStart: !0,
                        onUpdate: !0,
                        onComplete: !0
                    }, d = a.extend(k, d),
                    l = [d.dur, d.drag ? 0 : d.dur],
                    m = a("#mCSB_" + i.idx),
                    n = a("#mCSB_" + i.idx + "_container"),
                    o = n.parent(),
                    p = j.callbacks.onTotalScrollOffset ? S.call(b, j.callbacks.onTotalScrollOffset) : [0, 0],
                    q = j.callbacks.onTotalScrollBackOffset ? S.call(b, j.callbacks.onTotalScrollBackOffset) : [0, 0];
                if (i.trigger = d.trigger, (0 !== o.scrollTop() || 0 !== o.scrollLeft()) && (a(".mCSB_" + i.idx + "_scrollbar").css("visibility", "visible"), o.scrollTop(0).scrollLeft(0)), "_resetY" !== c || i.contentReset.y || (e("onOverflowYNone") && j.callbacks.onOverflowYNone.call(b[0]), i.contentReset.y = 1), "_resetX" !== c || i.contentReset.x || (e("onOverflowXNone") && j.callbacks.onOverflowXNone.call(b[0]), i.contentReset.x = 1), "_resetY" !== c && "_resetX" !== c) {
                    switch (!i.contentReset.y && b[0].mcs || !i.overflowed[0] || (e("onOverflowY") && j.callbacks.onOverflowY.call(b[0]), i.contentReset.x = null), !i.contentReset.x && b[0].mcs || !i.overflowed[1] || (e("onOverflowX") && j.callbacks.onOverflowX.call(b[0]), i.contentReset.x = null), j.snapAmount && (c = V(c, j.snapAmount, j.snapOffset)), d.dir) {
                        case "x":
                            var r = a("#mCSB_" + i.idx + "_dragger_horizontal"),
                                s = "left",
                                t = n[0].offsetLeft,
                                u = [m.width() - n.outerWidth(!1), r.parent().width() - r.width()],
                                v = [c, 0 === c ? 0 : c / i.scrollRatio.x],
                                w = p[1],
                                x = q[1],
                                y = w > 0 ? w / i.scrollRatio.x : 0,
                                z = x > 0 ? x / i.scrollRatio.x : 0;
                            break;
                        case "y":
                            var r = a("#mCSB_" + i.idx + "_dragger_vertical"),
                                s = "top",
                                t = n[0].offsetTop,
                                u = [m.height() - n.outerHeight(!1), r.parent().height() - r.height()],
                                v = [c, 0 === c ? 0 : c / i.scrollRatio.y],
                                w = p[0],
                                x = q[0],
                                y = w > 0 ? w / i.scrollRatio.y : 0,
                                z = x > 0 ? x / i.scrollRatio.y : 0
                    }
                    v[1] < 0 || 0 === v[0] && 0 === v[1] ? v = [0, 0] : v[1] >= u[1] ? v = [u[0], u[1]] : v[0] = -v[0], b[0].mcs || (h(), e("onInit") && j.callbacks.onInit.call(b[0])), clearTimeout(n[0].onCompleteTimeout), (i.tweenRunning || !(0 === t && v[0] >= 0 || t === u[0] && v[0] <= u[0])) && (Y(r[0], s, Math.round(v[1]), l[1], d.scrollEasing), Y(n[0], s, Math.round(v[0]), l[0], d.scrollEasing, d.overwrite, {
                        onStart: function() {
                            d.callbacks && d.onStart && !i.tweenRunning && (e("onScrollStart") && (h(), j.callbacks.onScrollStart.call(b[0])), i.tweenRunning = !0, A(r), i.cbOffsets = g())
                        },
                        onUpdate: function() {
                            d.callbacks && d.onUpdate && e("whileScrolling") && (h(), j.callbacks.whileScrolling.call(b[0]))
                        },
                        onComplete: function() {
                            if (d.callbacks && d.onComplete) {
                                "yx" === j.axis && clearTimeout(n[0].onCompleteTimeout);
                                var a = n[0].idleTimer || 0;
                                n[0].onCompleteTimeout = setTimeout(function() {
                                    e("onScroll") && (h(), j.callbacks.onScroll.call(b[0])), e("onTotalScroll") && v[1] >= u[1] - y && i.cbOffsets[0] && (h(), j.callbacks.onTotalScroll.call(b[0])), e("onTotalScrollBack") && v[1] <= z && i.cbOffsets[1] && (h(), j.callbacks.onTotalScrollBack.call(b[0])), i.tweenRunning = !1, n[0].idleTimer = 0, A(r, "hide")
                                }, a)
                            }
                        }
                    }))
                }
            }, Y = function(a, c, d, e, f, g, h) {
                function i() {
                    w.stop || (t || p.call(), t = Z() - s, j(), t >= w.time && (w.time = t > w.time ? t + n - (t - w.time) : t + n - 1, w.time < t + 1 && (w.time = t + 1)), w.time < e ? w.id = o(i) : r.call())
                }

                function j() {
                    e > 0 ? (w.currVal = m(w.time, u, x, e, f), v[c] = Math.round(w.currVal) + "px") : v[c] = d + "px", q.call()
                }

                function k() {
                    n = 1e3 / 60, w.time = t + n, o = b.requestAnimationFrame ? b.requestAnimationFrame : function(a) {
                        return j(), setTimeout(a, .01)
                    }, w.id = o(i)
                }

                function l() {
                    null != w.id && (b.requestAnimationFrame ? b.cancelAnimationFrame(w.id) : clearTimeout(w.id), w.id = null)
                }

                function m(a, b, c, d, e) {
                    switch (e) {
                        case "linear":
                        case "mcsLinear":
                            return c * a / d + b;
                        case "mcsLinearOut":
                            return a /= d, a--, c * Math.sqrt(1 - a * a) + b;
                        case "easeInOutSmooth":
                            return a /= d / 2, 1 > a ? c / 2 * a * a + b : (a--, -c / 2 * (a * (a - 2) - 1) + b);
                        case "easeInOutStrong":
                            return a /= d / 2, 1 > a ? c / 2 * Math.pow(2, 10 * (a - 1)) + b : (a--, c / 2 * (-Math.pow(2, -10 * a) + 2) + b);
                        case "easeInOut":
                        case "mcsEaseInOut":
                            return a /= d / 2, 1 > a ? c / 2 * a * a * a + b : (a -= 2, c / 2 * (a * a * a + 2) + b);
                        case "easeOutSmooth":
                            return a /= d, a--, -c * (a * a * a * a - 1) + b;
                        case "easeOutStrong":
                            return c * (-Math.pow(2, -10 * a / d) + 1) + b;
                        case "easeOut":
                        case "mcsEaseOut":
                        default:
                            var f = (a /= d) * a,
                                g = f * a;
                            return b + c * (.499999999999997 * g * f + -2.5 * f * f + 5.5 * g + -6.5 * f + 4 * a)
                    }
                }
                a._mTween || (a._mTween = {
                    top: {},
                    left: {}
                });
                var n, o, h = h || {}, p = h.onStart || function() {}, q = h.onUpdate || function() {}, r = h.onComplete || function() {}, s = Z(),
                    t = 0,
                    u = a.offsetTop,
                    v = a.style,
                    w = a._mTween[c];
                "left" === c && (u = a.offsetLeft);
                var x = d - u;
                w.stop = 0, "none" !== g && l(), k()
            }, Z = function() {
                return b.performance && b.performance.now ? b.performance.now() : b.performance && b.performance.webkitNow ? b.performance.webkitNow() : Date.now ? Date.now() : (new Date).getTime()
            }, $ = function() {
                var a = this;
                a._mTween || (a._mTween = {
                    top: {},
                    left: {}
                });
                for (var c = ["top", "left"], d = 0; d < c.length; d++) {
                    var e = c[d];
                    a._mTween[e].id && (b.requestAnimationFrame ? b.cancelAnimationFrame(a._mTween[e].id) : clearTimeout(a._mTween[e].id), a._mTween[e].id = null, a._mTween[e].stop = 1)
                }
            }, _ = function(a, b) {
                try {
                    delete a[b]
                } catch (c) {
                    a[b] = null
                }
            }, aa = function(a) {
                return !(a.which && 1 !== a.which)
            }, ba = function(a) {
                var b = a.originalEvent.pointerType;
                return !(b && "touch" !== b && 2 !== b)
            }, ca = function(a) {
                return !isNaN(parseFloat(a)) && isFinite(a)
            }, da = function(a) {
                var b = a.parents(".mCSB_container");
                return [a.offset().top - b.offset().top, a.offset().left - b.offset().left]
            };
        a.fn[e] = function(b) {
            return n[b] ? n[b].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof b && b ? void a.error("Method " + b + " does not exist") : n.init.apply(this, arguments)
        }, a[e] = function(b) {
            return n[b] ? n[b].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof b && b ? void a.error("Method " + b + " does not exist") : n.init.apply(this, arguments)
        }, a[e].defaults = h, b[e] = !0, a(b).load(function() {
            a(g)[e](), a.extend(a.expr[":"], {
                mcsInView: a.expr[":"].mcsInView || function(b) {
                    var c, d, e = a(b),
                        f = e.parents(".mCSB_container");
                    return f.length ? (c = f.parent(), d = [f[0].offsetTop, f[0].offsetLeft], d[0] + da(e)[0] >= 0 && d[0] + da(e)[0] < c.height() - e.outerHeight(!1) && d[1] + da(e)[1] >= 0 && d[1] + da(e)[1] < c.width() - e.outerWidth(!1)) : void 0
                },
                mcsOverflow: a.expr[":"].mcsOverflow || function(b) {
                    var c = a(b).data(f);
                    return c ? c.overflowed[0] || c.overflowed[1] : void 0
                }
            })
        })
    })
}(jQuery, window, document),
function(a, b, c) {
    function d(b, c) {
        this.bodyOverflowX, this.callbacks = {
            hide: [],
            show: []
        }, this.checkInterval = null, this.Content, this.$el = a(b), this.$elProxy, this.elProxyPosition, this.enabled = !0, this.options = a.extend({}, i, c), this.mouseIsOverProxy = !1, this.namespace = "tooltipster-" + Math.round(1e5 * Math.random()), this.Status = "hidden", this.timerHide = null, this.timerShow = null, this.$tooltip, this.options.iconTheme = this.options.iconTheme.replace(".", ""), this.options.theme = this.options.theme.replace(".", ""), this._init()
    }

    function e(b, c) {
        var d = !0;
        return a.each(b, function(a) {
            return "undefined" == typeof c[a] || b[a] !== c[a] ? (d = !1, !1) : void 0
        }), d
    }

    function f() {
        return !k && j
    }

    function g() {
        var a = c.body || c.documentElement,
            b = a.style,
            d = "transition";
        if ("string" == typeof b[d]) return !0;
        v = ["Moz", "Webkit", "Khtml", "O", "ms"], d = d.charAt(0).toUpperCase() + d.substr(1);
        for (var e = 0; e < v.length; e++)
            if ("string" == typeof b[v[e] + d]) return !0;
        return !1
    }
    var h = "tooltipster",
        i = {
            animation: "fade",
            arrow: !0,
            arrowColor: "",
            autoClose: !0,
            content: null,
            contentAsHTML: !1,
            contentCloning: !0,
            debug: !0,
            delay: 200,
            minWidth: 0,
            maxWidth: null,
            functionInit: function() {},
            functionBefore: function(a, b) {
                b()
            },
            functionReady: function() {},
            functionAfter: function() {},
            hideOnClick: !1,
            icon: "(?)",
            iconCloning: !0,
            iconDesktop: !1,
            iconTouch: !1,
            iconTheme: "tooltipster-icon",
            interactive: !1,
            interactiveTolerance: 350,
            multiple: !1,
            offsetX: 0,
            offsetY: 0,
            onlyOne: !1,
            position: "top",
            positionTracker: !1,
            positionTrackerCallback: function() {
                "hover" == this.option("trigger") && this.option("autoClose") && this.hide()
            },
            restoration: "current",
            speed: 350,
            timer: 0,
            theme: "tooltipster-default",
            touchDevices: !0,
            trigger: "hover",
            updateAnimation: !0
        };
    d.prototype = {
        _init: function() {
            var b = this;
            if (c.querySelector) {
                var d = null;
                void 0 === b.$el.data("tooltipster-initialTitle") && (d = b.$el.attr("title"), void 0 === d && (d = null), b.$el.data("tooltipster-initialTitle", d)), b._content_set(null !== b.options.content ? b.options.content : d);
                var e = b.options.functionInit.call(b.$el, b.$el, b.Content);
                "undefined" != typeof e && b._content_set(e), b.$el.removeAttr("title").addClass("tooltipstered"), !j && b.options.iconDesktop || j && b.options.iconTouch ? ("string" == typeof b.options.icon ? (b.$elProxy = a('<span class="' + b.options.iconTheme + '"></span>'), b.$elProxy.text(b.options.icon)) : b.$elProxy = b.options.iconCloning ? b.options.icon.clone(!0) : b.options.icon, b.$elProxy.insertAfter(b.$el)) : b.$elProxy = b.$el, "hover" == b.options.trigger ? (b.$elProxy.on("mouseenter." + b.namespace, function() {
                    (!f() || b.options.touchDevices) && (b.mouseIsOverProxy = !0, b._show())
                }).on("mouseleave." + b.namespace, function() {
                    (!f() || b.options.touchDevices) && (b.mouseIsOverProxy = !1)
                }), j && b.options.touchDevices && b.$elProxy.on("touchstart." + b.namespace, function() {
                    b._showNow()
                })) : "click" == b.options.trigger && b.$elProxy.on("click." + b.namespace, function() {
                    (!f() || b.options.touchDevices) && b._show()
                })
            }
        },
        _show: function() {
            var a = this;
            "shown" != a.Status && "appearing" != a.Status && (a.options.delay ? a.timerShow = setTimeout(function() {
                ("click" == a.options.trigger || "hover" == a.options.trigger && a.mouseIsOverProxy) && a._showNow()
            }, a.options.delay) : a._showNow())
        },
        _showNow: function(c) {
            var d = this;
            d.options.functionBefore.call(d.$el, d.$el, function() {
                if (d.enabled && null !== d.Content) {
                    c && d.callbacks.show.push(c), d.callbacks.hide = [], clearTimeout(d.timerShow), d.timerShow = null, clearTimeout(d.timerHide), d.timerHide = null, d.options.onlyOne && a(".tooltipstered").not(d.$el).each(function(b, c) {
                        var d = a(c),
                            e = d.data("tooltipster-ns");
                        a.each(e, function(a, b) {
                            var c = d.data(b),
                                e = c.status(),
                                f = c.option("autoClose");
                            "hidden" !== e && "disappearing" !== e && f && c.hide()
                        })
                    });
                    var e = function() {
                        d.Status = "shown", a.each(d.callbacks.show, function(a, b) {
                            b.call(d.$el)
                        }), d.callbacks.show = []
                    };
                    if ("hidden" !== d.Status) {
                        var f = 0;
                        "disappearing" === d.Status ? (d.Status = "appearing", g() ? (d.$tooltip.clearQueue().removeClass("tooltipster-dying").addClass("tooltipster-" + d.options.animation + "-show"), d.options.speed > 0 && d.$tooltip.delay(d.options.speed), d.$tooltip.queue(e)) : d.$tooltip.stop().fadeIn(e)) : "shown" === d.Status && e()
                    } else {
                        d.Status = "appearing";
                        var f = d.options.speed;
                        d.bodyOverflowX = a("body").css("overflow-x"), a("body").css("overflow-x", "hidden");
                        var h = "tooltipster-" + d.options.animation,
                            i = "-webkit-transition-duration: " + d.options.speed + "ms; -webkit-animation-duration: " + d.options.speed + "ms; -moz-transition-duration: " + d.options.speed + "ms; -moz-animation-duration: " + d.options.speed + "ms; -o-transition-duration: " + d.options.speed + "ms; -o-animation-duration: " + d.options.speed + "ms; -ms-transition-duration: " + d.options.speed + "ms; -ms-animation-duration: " + d.options.speed + "ms; transition-duration: " + d.options.speed + "ms; animation-duration: " + d.options.speed + "ms;",
                            k = d.options.minWidth ? "min-width:" + Math.round(d.options.minWidth) + "px;" : "",
                            l = d.options.maxWidth ? "max-width:" + Math.round(d.options.maxWidth) + "px;" : "",
                            m = d.options.interactive ? "pointer-events: auto;" : "";
                        if (d.$tooltip = a('<div class="tooltipster-base ' + d.options.theme + '" style="' + k + " " + l + " " + m + " " + i + '"><div class="tooltipster-content"></div></div>'), g() && d.$tooltip.addClass(h), d._content_insert(), d.$tooltip.appendTo("body"), d.reposition(), d.options.functionReady.call(d.$el, d.$el, d.$tooltip), g() ? (d.$tooltip.addClass(h + "-show"), d.options.speed > 0 && d.$tooltip.delay(d.options.speed), d.$tooltip.queue(e)) : d.$tooltip.css("display", "none").fadeIn(d.options.speed, e), d._interval_set(), a(b).on("scroll." + d.namespace + " resize." + d.namespace, function() {
                            d.reposition()
                        }), d.options.autoClose)
                            if (a("body").off("." + d.namespace), "hover" == d.options.trigger) {
                                if (j && setTimeout(function() {
                                    a("body").on("touchstart." + d.namespace, function() {
                                        d.hide()
                                    })
                                }, 0), d.options.interactive) {
                                    j && d.$tooltip.on("touchstart." + d.namespace, function(a) {
                                        a.stopPropagation()
                                    });
                                    var n = null;
                                    d.$elProxy.add(d.$tooltip).on("mouseleave." + d.namespace + "-autoClose", function() {
                                        clearTimeout(n), n = setTimeout(function() {
                                            d.hide()
                                        }, d.options.interactiveTolerance)
                                    }).on("mouseenter." + d.namespace + "-autoClose", function() {
                                        clearTimeout(n)
                                    })
                                } else d.$elProxy.on("mouseleave." + d.namespace + "-autoClose", function() {
                                    d.hide()
                                });
                                d.options.hideOnClick && d.$elProxy.on("click." + d.namespace + "-autoClose", function() {
                                    d.hide()
                                })
                            } else "click" == d.options.trigger && (setTimeout(function() {
                                a("body").on("click." + d.namespace + " touchstart." + d.namespace, function() {
                                    d.hide()
                                })
                            }, 0), d.options.interactive && d.$tooltip.on("click." + d.namespace + " touchstart." + d.namespace, function(a) {
                                a.stopPropagation()
                            }))
                    }
                    d.options.timer > 0 && (d.timerHide = setTimeout(function() {
                        d.timerHide = null, d.hide()
                    }, d.options.timer + f))
                }
            })
        },
        _interval_set: function() {
            var b = this;
            b.checkInterval = setInterval(function() {
                if (0 === a("body").find(b.$el).length || 0 === a("body").find(b.$elProxy).length || "hidden" == b.Status || 0 === a("body").find(b.$tooltip).length)("shown" == b.Status || "appearing" == b.Status) && b.hide(), b._interval_cancel();
                else if (b.options.positionTracker) {
                    var c = b._repositionInfo(b.$elProxy),
                        d = !1;
                    e(c.dimension, b.elProxyPosition.dimension) && ("fixed" === b.$elProxy.css("position") ? e(c.position, b.elProxyPosition.position) && (d = !0) : e(c.offset, b.elProxyPosition.offset) && (d = !0)), d || (b.reposition(), b.options.positionTrackerCallback.call(b, b.$el))
                }
            }, 200)
        },
        _interval_cancel: function() {
            clearInterval(this.checkInterval), this.checkInterval = null
        },
        _content_set: function(a) {
            "object" == typeof a && null !== a && this.options.contentCloning && (a = a.clone(!0)), this.Content = a
        },
        _content_insert: function() {
            var a = this,
                b = this.$tooltip.find(".tooltipster-content");
            "string" != typeof a.Content || a.options.contentAsHTML ? b.empty().append(a.Content) : b.text(a.Content)
        },
        _update: function(a) {
            var b = this;
            b._content_set(a), null !== b.Content ? "hidden" !== b.Status && (b._content_insert(), b.reposition(), b.options.updateAnimation && (g() ? (b.$tooltip.css({
                width: "",
                "-webkit-transition": "all " + b.options.speed + "ms, width 0ms, height 0ms, left 0ms, top 0ms",
                "-moz-transition": "all " + b.options.speed + "ms, width 0ms, height 0ms, left 0ms, top 0ms",
                "-o-transition": "all " + b.options.speed + "ms, width 0ms, height 0ms, left 0ms, top 0ms",
                "-ms-transition": "all " + b.options.speed + "ms, width 0ms, height 0ms, left 0ms, top 0ms",
                transition: "all " + b.options.speed + "ms, width 0ms, height 0ms, left 0ms, top 0ms"
            }).addClass("tooltipster-content-changing"), setTimeout(function() {
                "hidden" != b.Status && (b.$tooltip.removeClass("tooltipster-content-changing"), setTimeout(function() {
                    "hidden" !== b.Status && b.$tooltip.css({
                        "-webkit-transition": b.options.speed + "ms",
                        "-moz-transition": b.options.speed + "ms",
                        "-o-transition": b.options.speed + "ms",
                        "-ms-transition": b.options.speed + "ms",
                        transition: b.options.speed + "ms"
                    })
                }, b.options.speed))
            }, b.options.speed)) : b.$tooltip.fadeTo(b.options.speed, .5, function() {
                "hidden" != b.Status && b.$tooltip.fadeTo(b.options.speed, 1)
            }))) : b.hide()
        },
        _repositionInfo: function(a) {
            return {
                dimension: {
                    height: a.outerHeight(!1),
                    width: a.outerWidth(!1)
                },
                offset: a.offset(),
                position: {
                    left: parseInt(a.css("left")),
                    top: parseInt(a.css("top"))
                }
            }
        },
        hide: function(c) {
            var d = this;
            c && d.callbacks.hide.push(c), d.callbacks.show = [], clearTimeout(d.timerShow), d.timerShow = null, clearTimeout(d.timerHide), d.timerHide = null;
            var e = function() {
                a.each(d.callbacks.hide, function(a, b) {
                    b.call(d.$el)
                }), d.callbacks.hide = []
            };
            if ("shown" == d.Status || "appearing" == d.Status) {
                d.Status = "disappearing";
                var f = function() {
                    d.Status = "hidden", "object" == typeof d.Content && null !== d.Content && d.Content.detach(), d.$tooltip.remove(), d.$tooltip = null, a(b).off("." + d.namespace), a("body").off("." + d.namespace).css("overflow-x", d.bodyOverflowX), a("body").off("." + d.namespace), d.$elProxy.off("." + d.namespace + "-autoClose"), d.options.functionAfter.call(d.$el, d.$el), e()
                };
                g() ? (d.$tooltip.clearQueue().removeClass("tooltipster-" + d.options.animation + "-show").addClass("tooltipster-dying"), d.options.speed > 0 && d.$tooltip.delay(d.options.speed), d.$tooltip.queue(f)) : d.$tooltip.stop().fadeOut(d.options.speed, f)
            } else "hidden" == d.Status && e();
            return d
        },
        show: function(a) {
            return this._showNow(a), this
        },
        update: function(a) {
            return this.content(a)
        },
        content: function(a) {
            return "undefined" == typeof a ? this.Content : (this._update(a), this)
        },
        reposition: function() {
            function c() {
                var c = a(b).scrollLeft();
                0 > C - c && (f = C - c, C = c), C + i - c > g && (f = C - (g + c - i), C = g + c - i)
            }

            function d(c, d) {
                h.offset.top - a(b).scrollTop() - j - F - 12 < 0 && d.indexOf("top") > -1 && (H = c), h.offset.top + h.dimension.height + j + 12 + F > a(b).scrollTop() + a(b).height() && d.indexOf("bottom") > -1 && (H = c, E = h.offset.top - j - F - 12)
            }
            var e = this;
            if (0 !== a("body").find(e.$tooltip).length) {
                e.$tooltip.css("width", ""), e.elProxyPosition = e._repositionInfo(e.$elProxy);
                var f = null,
                    g = a(b).width(),
                    h = e.elProxyPosition,
                    i = e.$tooltip.outerWidth(!1),
                    j = (e.$tooltip.innerWidth() + 1, e.$tooltip.outerHeight(!1));
                if (e.$elProxy.is("area")) {
                    var k = e.$elProxy.attr("shape"),
                        l = e.$elProxy.parent().attr("name"),
                        m = a('img[usemap="#' + l + '"]'),
                        n = m.offset().left,
                        o = m.offset().top,
                        p = void 0 !== e.$elProxy.attr("coords") ? e.$elProxy.attr("coords").split(",") : void 0;
                    if ("circle" == k) {
                        var q = parseInt(p[0]),
                            r = parseInt(p[1]),
                            s = parseInt(p[2]);
                        h.dimension.height = 2 * s, h.dimension.width = 2 * s, h.offset.top = o + r - s, h.offset.left = n + q - s
                    } else if ("rect" == k) {
                        var q = parseInt(p[0]),
                            r = parseInt(p[1]),
                            t = parseInt(p[2]),
                            u = parseInt(p[3]);
                        h.dimension.height = u - r, h.dimension.width = t - q, h.offset.top = o + r, h.offset.left = n + q
                    } else if ("poly" == k) {
                        for (var v = 0, w = 0, x = 0, y = 0, z = "even", A = 0; A < p.length; A++) {
                            var B = parseInt(p[A]);
                            "even" == z ? (B > x && (x = B, 0 === A && (v = x)), v > B && (v = B), z = "odd") : (B > y && (y = B, 1 == A && (w = y)), w > B && (w = B), z = "even")
                        }
                        h.dimension.height = y - w, h.dimension.width = x - v, h.offset.top = o + w, h.offset.left = n + v
                    } else h.dimension.height = m.outerHeight(!1), h.dimension.width = m.outerWidth(!1), h.offset.top = o, h.offset.left = n
                }
                var C = 0,
                    D = 0,
                    E = 0,
                    F = parseInt(e.options.offsetY),
                    G = parseInt(e.options.offsetX),
                    H = e.options.position;
                if ("top" == H) {
                    var I = h.offset.left + i - (h.offset.left + h.dimension.width);
                    C = h.offset.left + G - I / 2, E = h.offset.top - j - F - 12, c(), d("bottom", "top")
                }
                if ("top-left" == H && (C = h.offset.left + G, E = h.offset.top - j - F - 12, c(), d("bottom-left", "top-left")), "top-right" == H && (C = h.offset.left + h.dimension.width + G - i, E = h.offset.top - j - F - 12, c(), d("bottom-right", "top-right")), "bottom" == H) {
                    var I = h.offset.left + i - (h.offset.left + h.dimension.width);
                    C = h.offset.left - I / 2 + G, E = h.offset.top + h.dimension.height + F + 12, c(), d("top", "bottom")
                }
                if ("bottom-left" == H && (C = h.offset.left + G, E = h.offset.top + h.dimension.height + F + 12, c(), d("top-left", "bottom-left")), "bottom-right" == H && (C = h.offset.left + h.dimension.width + G - i, E = h.offset.top + h.dimension.height + F + 12, c(), d("top-right", "bottom-right")), "left" == H) {
                    C = h.offset.left - G - i - 12, D = h.offset.left + G + h.dimension.width + 12;
                    var J = h.offset.top + j - (h.offset.top + h.dimension.height);
                    if (E = h.offset.top - J / 2 - F, 0 > C && D + i > g) {
                        var K = 2 * parseFloat(e.$tooltip.css("border-width")),
                            L = i + C - K;
                        e.$tooltip.css("width", L + "px"), j = e.$tooltip.outerHeight(!1), C = h.offset.left - G - L - 12 - K, J = h.offset.top + j - (h.offset.top + h.dimension.height), E = h.offset.top - J / 2 - F
                    } else 0 > C && (C = h.offset.left + G + h.dimension.width + 12, f = "left")
                }
                if ("right" == H) {
                    C = h.offset.left + G + h.dimension.width + 12, D = h.offset.left - G - i - 12;
                    var J = h.offset.top + j - (h.offset.top + h.dimension.height);
                    if (E = h.offset.top - J / 2 - F, C + i > g && 0 > D) {
                        var K = 2 * parseFloat(e.$tooltip.css("border-width")),
                            L = g - C - K;
                        e.$tooltip.css("width", L + "px"), j = e.$tooltip.outerHeight(!1), J = h.offset.top + j - (h.offset.top + h.dimension.height), E = h.offset.top - J / 2 - F
                    } else C + i > g && (C = h.offset.left - G - i - 12, f = "right")
                }
                if (e.options.arrow) {
                    var M = "tooltipster-arrow-" + H;
                    if (e.options.arrowColor.length < 1) var N = e.$tooltip.css("background-color");
                    else var N = e.options.arrowColor; if (f ? "left" == f ? (M = "tooltipster-arrow-right", f = "") : "right" == f ? (M = "tooltipster-arrow-left", f = "") : f = "left:" + Math.round(f) + "px;" : f = "", "top" == H || "top-left" == H || "top-right" == H) var O = parseFloat(e.$tooltip.css("border-bottom-width")),
                    P = e.$tooltip.css("border-bottom-color");
                    else if ("bottom" == H || "bottom-left" == H || "bottom-right" == H) var O = parseFloat(e.$tooltip.css("border-top-width")),
                    P = e.$tooltip.css("border-top-color");
                    else if ("left" == H) var O = parseFloat(e.$tooltip.css("border-right-width")),
                    P = e.$tooltip.css("border-right-color");
                    else if ("right" == H) var O = parseFloat(e.$tooltip.css("border-left-width")),
                    P = e.$tooltip.css("border-left-color");
                    else var O = parseFloat(e.$tooltip.css("border-bottom-width")),
                    P = e.$tooltip.css("border-bottom-color");
                    O > 1 && O++;
                    var Q = "";
                    if (0 !== O) {
                        var R = "",
                            S = "border-color: " + P + ";"; - 1 !== M.indexOf("bottom") ? R = "margin-top: -" + Math.round(O) + "px;" : -1 !== M.indexOf("top") ? R = "margin-bottom: -" + Math.round(O) + "px;" : -1 !== M.indexOf("left") ? R = "margin-right: -" + Math.round(O) + "px;" : -1 !== M.indexOf("right") && (R = "margin-left: -" + Math.round(O) + "px;"), Q = '<span class="tooltipster-arrow-border" style="' + R + " " + S + ';"></span>'
                    }
                    e.$tooltip.find(".tooltipster-arrow").remove();
                    var T = '<div class="' + M + ' tooltipster-arrow" style="' + f + '">' + Q + '<span style="border-color:' + N + ';"></span></div>';
                    e.$tooltip.append(T)
                }
                e.$tooltip.css({
                    top: Math.round(E) + "px",
                    left: Math.round(C) + "px"
                })
            }
            return e
        },
        enable: function() {
            return this.enabled = !0, this
        },
        disable: function() {
            return this.hide(), this.enabled = !1, this
        },
        destroy: function() {
            var b = this;
            b.hide(), b.$el[0] !== b.$elProxy[0] && b.$elProxy.remove(), b.$el.removeData(b.namespace).off("." + b.namespace);
            var c = b.$el.data("tooltipster-ns");
            if (1 === c.length) {
                var d = null;
                "previous" === b.options.restoration ? d = b.$el.data("tooltipster-initialTitle") : "current" === b.options.restoration && (d = "string" == typeof b.Content ? b.Content : a("<div></div>").append(b.Content).html()), d && b.$el.attr("title", d), b.$el.removeClass("tooltipstered").removeData("tooltipster-ns").removeData("tooltipster-initialTitle")
            } else c = a.grep(c, function(a) {
                return a !== b.namespace
            }), b.$el.data("tooltipster-ns", c);
            return b
        },
        elementIcon: function() {
            return this.$el[0] !== this.$elProxy[0] ? this.$elProxy[0] : void 0
        },
        elementTooltip: function() {
            return this.$tooltip ? this.$tooltip[0] : void 0
        },
        option: function(a, b) {
            return "undefined" == typeof b ? this.options[a] : (this.options[a] = b, this)
        },
        status: function() {
            return this.Status
        }
    }, a.fn[h] = function() {
        var b = arguments;
        if (0 === this.length) {
            if ("string" == typeof b[0]) {
                var c = !0;
                switch (b[0]) {
                    case "setDefaults":
                        a.extend(i, b[1]);
                        break;
                    default:
                        c = !1
                }
                return c ? !0 : this
            }
            return this
        }
        if ("string" == typeof b[0]) {
            var e = "#*$~&";
            return this.each(function() {
                var c = a(this).data("tooltipster-ns"),
                    d = c ? a(this).data(c[0]) : null;
                if (!d) throw new Error("You called Tooltipster's \"" + b[0] + '" method on an uninitialized element');
                if ("function" != typeof d[b[0]]) throw new Error('Unknown method .tooltipster("' + b[0] + '")');
                var f = d[b[0]](b[1], b[2]);
                return f !== d ? (e = f, !1) : void 0
            }), "#*$~&" !== e ? e : this
        }
        var f = [],
            g = b[0] && "undefined" != typeof b[0].multiple,
            h = g && b[0].multiple || !g && i.multiple,
            j = b[0] && "undefined" != typeof b[0].debug,
            k = j && b[0].debug || !j && i.debug;
        return this.each(function() {
            var c = !1,
                e = a(this).data("tooltipster-ns"),
                g = null;
            e ? h ? c = !0 : k && console.log('Tooltipster: one or more tooltips are already attached to this element: ignoring. Use the "multiple" option to attach more tooltips.') : c = !0, c && (g = new d(this, b[0]), e || (e = []), e.push(g.namespace), a(this).data("tooltipster-ns", e), a(this).data(g.namespace, g)), f.push(g)
        }), h ? f : this
    };
    var j = !! ("ontouchstart" in b),
        k = !1;
    a("body").one("mousemove", function() {
        k = !0
    })
}(jQuery, window, document),
function(a) {
    function b(a, b) {
        if (!(a.originalEvent.touches.length > 1)) {
            a.preventDefault();
            var c = a.originalEvent.changedTouches[0],
                d = document.createEvent("MouseEvents");
            d.initMouseEvent(b, !0, !0, window, 1, c.screenX, c.screenY, c.clientX, c.clientY, !1, !1, !1, !1, 0, null), a.target.dispatchEvent(d)
        }
    }
    if (a.support.touch = "ontouchend" in document, a.support.touch) {
        var c, d = a.ui.mouse.prototype,
            e = d._mouseInit,
            f = d._mouseDestroy;
        d._touchStart = function(a) {
            var d = this;
            !c && d._mouseCapture(a.originalEvent.changedTouches[0]) && (c = !0, d._touchMoved = !1, b(a, "mouseover"), b(a, "mousemove"), b(a, "mousedown"))
        }, d._touchMove = function(a) {
            c && (this._touchMoved = !0, b(a, "mousemove"))
        }, d._touchEnd = function(a) {
            c && (b(a, "mouseup"), b(a, "mouseout"), this._touchMoved || b(a, "click"), c = !1)
        }, d._mouseInit = function() {
            var b = this;
            b.element.bind({
                touchstart: a.proxy(b, "_touchStart"),
                touchmove: a.proxy(b, "_touchMove"),
                touchend: a.proxy(b, "_touchEnd")
            }), e.call(b)
        }, d._mouseDestroy = function() {
            var b = this;
            b.element.unbind({
                touchstart: a.proxy(b, "_touchStart"),
                touchmove: a.proxy(b, "_touchMove"),
                touchend: a.proxy(b, "_touchEnd")
            }), f.call(b)
        }
    }
}(jQuery);
var jsPDF = function() {
    function a(d, e, f, g) {
        d = "undefined" == typeof d ? "p" : d.toString().toLowerCase(), "undefined" == typeof e && (e = "mm"), "undefined" == typeof f && (f = "a4"), "undefined" == typeof g && "undefined" == typeof zpipe && (g = !1);
        var h = f.toString().toLowerCase(),
            i = [],
            j = 0,
            k = g;
        g = {
            a0: [2383.94, 3370.39],
            a1: [1683.78, 2383.94],
            a2: [1190.55, 1683.78],
            a3: [841.89, 1190.55],
            a4: [595.28, 841.89],
            a5: [419.53, 595.28],
            a6: [297.64, 419.53],
            a7: [209.76, 297.64],
            a8: [147.4, 209.76],
            a9: [104.88, 147.4],
            a10: [73.7, 104.88],
            b0: [2834.65, 4008.19],
            b1: [2004.09, 2834.65],
            b2: [1417.32, 2004.09],
            b3: [1000.63, 1417.32],
            b4: [708.66, 1000.63],
            b5: [498.9, 708.66],
            b6: [354.33, 498.9],
            b7: [249.45, 354.33],
            b8: [175.75, 249.45],
            b9: [124.72, 175.75],
            b10: [87.87, 124.72],
            c0: [2599.37, 3676.54],
            c1: [1836.85, 2599.37],
            c2: [1298.27, 1836.85],
            c3: [918.43, 1298.27],
            c4: [649.13, 918.43],
            c5: [459.21, 649.13],
            c6: [323.15, 459.21],
            c7: [229.61, 323.15],
            c8: [161.57, 229.61],
            c9: [113.39, 161.57],
            c10: [79.37, 113.39],
            letter: [612, 792],
            "government-letter": [576, 756],
            legal: [612, 1008],
            "junior-legal": [576, 360],
            ledger: [1224, 792],
            tabloid: [792, 1224]
        };
        var l, m, n, o, p, q, r, s, t = "0 g",
            u = 0,
            v = [],
            w = 2,
            x = !1,
            y = [],
            z = {}, A = {}, B = 16,
            C = {
                title: "",
                subject: "",
                author: "",
                keywords: "",
                creator: ""
            }, D = 0,
            E = 0,
            F = {}, G = new c(F),
            H = function(a) {
                return a.toFixed(2)
            }, I = function(a) {
                var b = a.toFixed(0);
                return 10 > a ? "0" + b : b
            }, J = function(a) {
                x ? v[u].push(a) : (i.push(a), j += a.length + 1)
            }, K = function() {
                return w++, y[w] = j, J(w + " 0 obj"), w
            }, L = function(a) {
                J("stream"), J(a), J("endstream")
            }, M = function(a, b) {
                var c;
                c = a;
                var d, e, f, g, h, i, j = b;
                if (void 0 === j && (j = {}), d = j.sourceEncoding ? d : "Unicode", f = j.outputEncoding, (j.autoencode || f) && z[l].metadata && z[l].metadata[d] && z[l].metadata[d].encoding && (d = z[l].metadata[d].encoding, !f && z[l].encoding && (f = z[l].encoding), !f && d.codePages && (f = d.codePages[0]), "string" == typeof f && (f = d[f]), f)) {
                    for (h = !1, g = [], d = 0, e = c.length; e > d; d++) g.push((i = f[c.charCodeAt(d)]) ? String.fromCharCode(i) : c[d]), g[d].charCodeAt(0) >> 8 && (h = !0);
                    c = g.join("")
                }
                for (d = c.length; void 0 === h && 0 !== d;) c.charCodeAt(d - 1) >> 8 && (h = !0), d--;
                if (h) {
                    for (g = j.noBOM ? [] : [254, 255], d = 0, e = c.length; e > d; d++) {
                        if (i = c.charCodeAt(d), j = i >> 8, j >> 8) throw Error("Character at position " + d.toString(10) + " of string '" + c + "' exceeds 16bits. Cannot be encoded into UCS-2 BE");
                        g.push(j), g.push(i - (j << 8))
                    }
                    c = String.fromCharCode.apply(void 0, g)
                }
                return c.replace(/\\/g, "\\\\").replace(/\(/g, "\\(").replace(/\)/g, "\\)")
            }, N = function() {
                u++, x = !0, v[u] = [], J(H(.200025 * o) + " w"), J("0 G"), 0 !== D && J(D.toString(10) + " J"), 0 !== E && J(E.toString(10) + " j"), G.publish("addPage", {
                    pageNumber: u
                })
            }, O = function(a, b) {
                var c;
                void 0 === a && (a = z[l].fontName), void 0 === b && (b = z[l].fontStyle);
                try {
                    c = A[a][b]
                } catch (d) {
                    c = void 0
                }
                if (!c) throw Error("Unable to look up font label for font '" + a + "', '" + b + "'. Refer to getFontList() for available fonts.");
                return c
            }, P = function() {
                x = !1, i = [], y = [], J("%PDF-1.3"), q = n * o, r = m * o;
                var a, b, c, d, e;
                for (a = 1; u >= a; a++) {
                    if (K(), J("<</Type /Page"), J("/Parent 1 0 R"), J("/Resources 2 0 R"), J("/Contents " + (w + 1) + " 0 R>>"), J("endobj"), b = v[a].join("\n"), K(), k) {
                        for (c = [], d = 0; d < b.length; ++d) c[d] = b.charCodeAt(d);
                        e = adler32cs.from(b), b = new Deflater(6), b.append(new Uint8Array(c)), b = b.flush(), c = [new Uint8Array([120, 156]), new Uint8Array(b), new Uint8Array([255 & e, e >> 8 & 255, e >> 16 & 255, e >> 24 & 255])], b = "";
                        for (d in c) c.hasOwnProperty(d) && (b += String.fromCharCode.apply(null, c[d]));
                        J("<</Length " + b.length + " /Filter [/FlateDecode]>>")
                    } else J("<</Length " + b.length + ">>");
                    L(b), J("endobj")
                }
                for (y[1] = j, J("1 0 obj"), J("<</Type /Pages"), s = "/Kids [", d = 0; u > d; d++) s += 3 + 2 * d + " 0 R ";
                J(s + "]"), J("/Count " + u), J("/MediaBox [0 0 " + H(q) + " " + H(r) + "]"), J(">>"), J("endobj");
                for (var f in z) z.hasOwnProperty(f) && (a = z[f], a.objectNumber = K(), J("<</BaseFont/" + a.PostScriptName + "/Type/Font"), "string" == typeof a.encoding && J("/Encoding/" + a.encoding), J("/Subtype/Type1>>"), J("endobj"));
                G.publish("putResources"), y[2] = j, J("2 0 obj"), J("<<"), J("/ProcSet [/PDF /Text /ImageB /ImageC /ImageI]"), J("/Font <<");
                for (var g in z) z.hasOwnProperty(g) && J("/" + g + " " + z[g].objectNumber + " 0 R");
                for (J(">>"), J("/XObject <<"), G.publish("putXobjectDict"), J(">>"), J(">>"), J("endobj"), G.publish("postPutResources"), K(), J("<<"), J("/Producer (jsPDF 0.9.0rc2)"), C.title && J("/Title (" + M(C.title) + ")"), C.subject && J("/Subject (" + M(C.subject) + ")"), C.author && J("/Author (" + M(C.author) + ")"), C.keywords && J("/Keywords (" + M(C.keywords) + ")"), C.creator && J("/Creator (" + M(C.creator) + ")"), f = new Date, J("/CreationDate (D:" + [f.getFullYear(), I(f.getMonth() + 1), I(f.getDate()), I(f.getHours()), I(f.getMinutes()), I(f.getSeconds())].join("") + ")"), J(">>"), J("endobj"), K(), J("<<"), J("/Type /Catalog"), J("/Pages 1 0 R"), J("/OpenAction [3 0 R /FitH null]"), J("/PageLayout /OneColumn"), G.publish("putCatalog"), J(">>"), J("endobj"), f = j, J("xref"), J("0 " + (w + 1)), J("0000000000 65535 f "), g = 1; w >= g; g++) a = y[g].toFixed(0), a = 10 > a.length ? Array(11 - a.length).join("0") + a : a, J(a + " 00000 n ");
                return J("trailer"), J("<<"), J("/Size " + (w + 1)), J("/Root " + w + " 0 R"), J("/Info " + (w - 1) + " 0 R"), J(">>"), J("startxref"), J(f), J("%%EOF"), x = !0, i.join("\n")
            }, Q = function(a) {
                var b = "S";
                return "F" === a ? b = "f" : ("FD" === a || "DF" === a) && (b = "B"), b
            }, R = function(a, b) {
                var c, d, e, f;
                switch (a) {
                    case void 0:
                        return P();
                    case "save":
                        if (navigator.getUserMedia && (void 0 === window.URL || void 0 === window.URL.createObjectURL)) return F.output("dataurlnewwindow");
                        for (c = P(), d = c.length, e = new Uint8Array(new ArrayBuffer(d)), f = 0; d > f; f++) e[f] = c.charCodeAt(f);
                        c = new Blob([e], {
                            type: "application/pdf"
                        }), saveAs(c, b);
                        break;
                    case "datauristring":
                    case "dataurlstring":
                        return "data:application/pdf;base64," + btoa(P());
                    case "datauri":
                    case "dataurl":
                        document.location.href = "data:application/pdf;base64," + btoa(P());
                        break;
                    case "dataurlnewwindow":
                        window.open("data:application/pdf;base64," + btoa(P()));
                        break;
                    default:
                        throw Error('Output type "' + a + '" is not supported.')
                }
            };
        if ("pt" === e) o = 1;
        else if ("mm" === e) o = 72 / 25.4;
        else if ("cm" === e) o = 72 / 2.54;
        else {
            if ("in" !== e) throw "Invalid unit: " + e;
            o = 72
        } if (g.hasOwnProperty(h)) m = g[h][1] / o, n = g[h][0] / o;
        else try {
            m = f[1], n = f[0]
        } catch (S) {
            throw "Invalid format: " + f
        }
        if ("p" === d || "portrait" === d) d = "p", n > m && (d = n, n = m, m = d);
        else {
            if ("l" !== d && "landscape" !== d) throw "Invalid orientation: " + d;
            d = "l", m > n && (d = n, n = m, m = d)
        }
        F.internal = {
            pdfEscape: M,
            getStyle: Q,
            getFont: function() {
                return z[O.apply(F, arguments)]
            },
            getFontSize: function() {
                return B
            },
            getLineHeight: function() {
                return 1.15 * B
            },
            btoa: btoa,
            write: function(a) {
                J(1 === arguments.length ? a : Array.prototype.join.call(arguments, " "))
            },
            getCoordinateString: function(a) {
                return H(a * o)
            },
            getVerticalCoordinateString: function(a) {
                return H((m - a) * o)
            },
            collections: {},
            newObject: K,
            putStream: L,
            events: G,
            scaleFactor: o,
            pageSize: {
                width: n,
                height: m
            },
            output: function(a, b) {
                return R(a, b)
            },
            getNumberOfPages: function() {
                return v.length - 1
            },
            pages: v
        }, F.addPage = function() {
            return N(), this
        }, F.text = function(a, b, c, d) {
            var e, f;
            if ("number" == typeof a && (e = a, f = b, a = c, b = e, c = f), "string" == typeof a && a.match(/[\n\r]/) && (a = a.split(/\r\n|\r|\n/g)), "undefined" == typeof d ? d = {
                noBOM: !0,
                autoencode: !0
            } : (void 0 === d.noBOM && (d.noBOM = !0), void 0 === d.autoencode && (d.autoencode = !0)), "string" == typeof a) d = M(a, d);
            else {
                if (!(a instanceof Array)) throw Error('Type of text must be string or Array. "' + a + '" is not recognized.');
                for (a = a.concat(), e = a.length - 1; - 1 !== e; e--) a[e] = M(a[e], d);
                d = a.join(") Tj\nT* (")
            }
            return J("BT\n/" + l + " " + B + " Tf\n" + 1.15 * B + " TL\n" + t + "\n" + H(b * o) + " " + H((m - c) * o) + " Td\n(" + d + ") Tj\nET"), this
        }, F.line = function(a, b, c, d) {
            return J(H(a * o) + " " + H((m - b) * o) + " m " + H(c * o) + " " + H((m - d) * o) + " l S"), this
        }, F.lines = function(a, b, c, d, e, f) {
            var g, h, i, j, k, l, n, p;
            for ("number" == typeof a && (g = a, h = b, a = c, b = g, c = h), e = Q(e), d = void 0 === d ? [1, 1] : d, J((b * o).toFixed(3) + " " + ((m - c) * o).toFixed(3) + " m "), g = d[0], d = d[1], h = a.length, p = c, c = 0; h > c; c++) i = a[c], 2 === i.length ? (b = i[0] * g + b, p = i[1] * d + p, J((b * o).toFixed(3) + " " + ((m - p) * o).toFixed(3) + " l")) : (j = i[0] * g + b, k = i[1] * d + p, l = i[2] * g + b, n = i[3] * d + p, b = i[4] * g + b, p = i[5] * d + p, J((j * o).toFixed(3) + " " + ((m - k) * o).toFixed(3) + " " + (l * o).toFixed(3) + " " + ((m - n) * o).toFixed(3) + " " + (b * o).toFixed(3) + " " + ((m - p) * o).toFixed(3) + " c"));
            return 1 == f && J(" h"), J(e), this
        }, F.rect = function(a, b, c, d, e) {
            return e = Q(e), J([H(a * o), H((m - b) * o), H(c * o), H(-d * o), "re", e].join(" ")), this
        }, F.triangle = function(a, b, c, d, e, f, g) {
            return this.lines([
                [c - a, d - b],
                [e - c, f - d],
                [a - e, b - f]
            ], a, b, [1, 1], g, !0), this
        }, F.roundedRect = function(a, b, c, d, e, f, g) {
            var h = 4 / 3 * (Math.SQRT2 - 1);
            return this.lines([
                [c - 2 * e, 0],
                [e * h, 0, e, f - f * h, e, f],
                [0, d - 2 * f],
                [0, f * h, -(e * h), f, -e, f],
                [-c + 2 * e, 0],
                [-(e * h), 0, -e, -(f * h), -e, -f],
                [0, -d + 2 * f],
                [0, -(f * h), e * h, -f, e, -f]
            ], a + e, b, [1, 1], g), this
        }, F.ellipse = function(a, b, c, d, e) {
            e = Q(e);
            var f = 4 / 3 * (Math.SQRT2 - 1) * c,
                g = 4 / 3 * (Math.SQRT2 - 1) * d;
            return J([H((a + c) * o), H((m - b) * o), "m", H((a + c) * o), H((m - (b - g)) * o), H((a + f) * o), H((m - (b - d)) * o), H(a * o), H((m - (b - d)) * o), "c"].join(" ")), J([H((a - f) * o), H((m - (b - d)) * o), H((a - c) * o), H((m - (b - g)) * o), H((a - c) * o), H((m - b) * o), "c"].join(" ")), J([H((a - c) * o), H((m - (b + g)) * o), H((a - f) * o), H((m - (b + d)) * o), H(a * o), H((m - (b + d)) * o), "c"].join(" ")), J([H((a + f) * o), H((m - (b + d)) * o), H((a + c) * o), H((m - (b + g)) * o), H((a + c) * o), H((m - b) * o), "c", e].join(" ")), this
        }, F.circle = function(a, b, c, d) {
            return this.ellipse(a, b, c, c, d)
        }, F.setProperties = function(a) {
            for (var b in C) C.hasOwnProperty(b) && a[b] && (C[b] = a[b]);
            return this
        }, F.setFontSize = function(a) {
            return B = a, this
        }, F.setFont = function(a, b) {
            return l = O(a, b), this
        }, F.setFontStyle = F.setFontType = function(a) {
            return l = O(void 0, a), this
        }, F.getFontList = function() {
            var a, b, c, d = {};
            for (a in A)
                if (A.hasOwnProperty(a))
                    for (b in d[a] = c = [], A[a]) A[a].hasOwnProperty(b) && c.push(b);
            return d
        }, F.setLineWidth = function(a) {
            return J((a * o).toFixed(2) + " w"), this
        }, F.setDrawColor = function(a, b, c, d) {
            return a = void 0 === b || void 0 === d && a === b === c ? "string" == typeof a ? a + " G" : H(a / 255) + " G" : void 0 === d ? "string" == typeof a ? [a, b, c, "RG"].join(" ") : [H(a / 255), H(b / 255), H(c / 255), "RG"].join(" ") : "string" == typeof a ? [a, b, c, d, "K"].join(" ") : [H(a), H(b), H(c), H(d), "K"].join(" "), J(a), this
        }, F.setFillColor = function(a, b, c, d) {
            return a = void 0 === b || void 0 === d && a === b === c ? "string" == typeof a ? a + " g" : H(a / 255) + " g" : void 0 === d ? "string" == typeof a ? [a, b, c, "rg"].join(" ") : [H(a / 255), H(b / 255), H(c / 255), "rg"].join(" ") : "string" == typeof a ? [a, b, c, d, "k"].join(" ") : [H(a), H(b), H(c), H(d), "k"].join(" "), J(a), this
        }, F.setTextColor = function(a, b, c) {
            return t = 0 === a && 0 === b && 0 === c || "undefined" == typeof b ? (a / 255).toFixed(3) + " g" : [(a / 255).toFixed(3), (b / 255).toFixed(3), (c / 255).toFixed(3), "rg"].join(" "), this
        }, F.CapJoinStyles = {
            0: 0,
            butt: 0,
            but: 0,
            miter: 0,
            1: 1,
            round: 1,
            rounded: 1,
            circle: 1,
            2: 2,
            projecting: 2,
            project: 2,
            square: 2,
            bevel: 2
        }, F.setLineCap = function(a) {
            var b = this.CapJoinStyles[a];
            if (void 0 === b) throw Error("Line cap style of '" + a + "' is not recognized. See or extend .CapJoinStyles property for valid styles");
            return D = b, J(b.toString(10) + " J"), this
        }, F.setLineJoin = function(a) {
            var b = this.CapJoinStyles[a];
            if (void 0 === b) throw Error("Line join style of '" + a + "' is not recognized. See or extend .CapJoinStyles property for valid styles");
            return E = b, J(b.toString(10) + " j"), this
        }, F.output = R, F.save = function(a) {
            F.output("save", a)
        };
        for (p in a.API) a.API.hasOwnProperty(p) && ("events" === p && a.API.events.length ? function(a, b) {
            var c, d, e;
            for (e = b.length - 1; - 1 !== e; e--) c = b[e][0], d = b[e][1], a.subscribe.apply(a, [c].concat("function" == typeof d ? [d] : d))
        }(G, a.API.events) : F[p] = a.API[p]);
        return function() {
            var a, c, d, e, f = [
                    ["Helvetica", "helvetica", "normal"],
                    ["Helvetica-Bold", "helvetica", "bold"],
                    ["Helvetica-Oblique", "helvetica", "italic"],
                    ["Helvetica-BoldOblique", "helvetica", "bolditalic"],
                    ["Courier", "courier", "normal"],
                    ["Courier-Bold", "courier", "bold"],
                    ["Courier-Oblique", "courier", "italic"],
                    ["Courier-BoldOblique", "courier", "bolditalic"],
                    ["Times-Roman", "times", "normal"],
                    ["Times-Bold", "times", "bold"],
                    ["Times-Italic", "times", "italic"],
                    ["Times-BoldItalic", "times", "bolditalic"]
                ];
            for (a = 0, c = f.length; c > a; a++) {
                var g = f[a][0],
                    h = f[a][1];
                d = f[a][2], e = "F" + (b(z) + 1).toString(10);
                var g = z[e] = {
                    id: e,
                    PostScriptName: g,
                    fontName: h,
                    fontStyle: d,
                    encoding: "StandardEncoding",
                    metadata: {}
                }, i = e;
                void 0 === A[h] && (A[h] = {}), A[h][d] = i, G.publish("addFont", g), d = e, e = f[a][0].split("-"), g = e[0], e = e[1] || "", void 0 === A[g] && (A[g] = {}), A[g][e] = d
            }
            G.publish("addFonts", {
                fonts: z,
                dictionary: A
            })
        }(), l = "F1", N(), G.publish("initialized"), F
    }
    "undefined" == typeof btoa && (window.btoa = function(a) {
        var b, c, d, e, f = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=".split(""),
            g = 0,
            h = 0,
            i = "",
            i = [];
        do b = a.charCodeAt(g++), c = a.charCodeAt(g++), d = a.charCodeAt(g++), e = b << 16 | c << 8 | d, b = e >> 18 & 63, c = e >> 12 & 63, d = e >> 6 & 63, e &= 63, i[h++] = f[b] + f[c] + f[d] + f[e]; while (g < a.length);
        return i = i.join(""), a = a.length % 3, (a ? i.slice(0, a - 3) : i) + "===".slice(a || 3)
    }), "undefined" == typeof atob && (window.atob = function(a) {
        var b, c, d, e, f, g = 0,
            h = 0;
        e = "";
        var i = [];
        if (!a) return a;
        a += "";
        do b = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=".indexOf(a.charAt(g++)), c = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=".indexOf(a.charAt(g++)), e = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=".indexOf(a.charAt(g++)), f = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=".indexOf(a.charAt(g++)), d = b << 18 | c << 12 | e << 6 | f, b = d >> 16 & 255, c = d >> 8 & 255, d &= 255, i[h++] = 64 === e ? String.fromCharCode(b) : 64 === f ? String.fromCharCode(b, c) : String.fromCharCode(b, c, d); while (g < a.length);
        return e = i.join("")
    });
    var b = "function" == typeof Object.keys ? function(a) {
            return Object.keys(a).length
        } : function(a) {
            var b, c = 0;
            for (b in a) a.hasOwnProperty(b) && c++;
            return c
        }, c = function(a) {
            this.topics = {}, this.context = a, this.publish = function(a, b) {
                if (this.topics[a]) {
                    var c, d, e, f, g = this.topics[a],
                        h = [],
                        i = function() {};
                    for (b = Array.prototype.slice.call(arguments, 1), d = 0, e = g.length; e > d; d++) f = g[d], c = f[0], f[1] && (f[0] = i, h.push(d)), c.apply(this.context, b);
                    for (d = 0, e = h.length; e > d; d++) g.splice(h[d], 1)
                }
            }, this.subscribe = function(a, b, c) {
                return this.topics[a] ? this.topics[a].push([b, c]) : this.topics[a] = [
                    [b, c]
                ], {
                    topic: a,
                    callback: b
                }
            }, this.unsubscribe = function(a) {
                if (this.topics[a.topic]) {
                    var b, c, d = this.topics[a.topic];
                    for (b = 0, c = d.length; c > b; b++) d[b][0] === a.callback && d.splice(b, 1)
                }
            }
        };
    return a.API = {
        events: []
    }, a
}();
! function(a) {
    var b = function() {
        var a, b = this.internal.collections.addImage_images;
        for (a in b) {
            var c = b[a],
                d = this.internal.newObject(),
                e = this.internal.write,
                f = this.internal.putStream;
            if (c.n = d, e("<</Type /XObject"), e("/Subtype /Image"), e("/Width " + c.w), e("/Height " + c.h), "Indexed" === c.cs ? e("/ColorSpace [/Indexed /DeviceRGB " + (c.pal.length / 3 - 1) + " " + (d + 1) + " 0 R]") : (e("/ColorSpace /" + c.cs), "DeviceCMYK" === c.cs && e("/Decode [1 0 1 0 1 0 1 0]")), e("/BitsPerComponent " + c.bpc), "f" in c && e("/Filter /" + c.f), "dp" in c && e("/DecodeParms <<" + c.dp + ">>"), "trns" in c && c.trns.constructor == Array)
                for (var g = "", h = 0; h < c.trns.length; h++) g += c[g][h] + " " + c.trns[h] + " ", e("/Mask [" + g + "]");
            "smask" in c && e("/SMask " + (d + 1) + " 0 R"), e("/Length " + c.data.length + ">>"), f(c.data), e("endobj")
        }
    }, c = function() {
            var a, b, c = this.internal.collections.addImage_images,
                d = this.internal.write;
            for (b in c) a = c[b], d("/I" + a.i, a.n, "0", "R")
        };
    a.addImage = function(a, d, e, f, g, h) {
        if ("object" == typeof a && 1 === a.nodeType) {
            d = document.createElement("canvas"), d.width = a.clientWidth, d.height = a.clientHeight;
            var i = d.getContext("2d");
            if (!i) throw "addImage requires canvas to be supported by browser.";
            i.drawImage(a, 0, 0, d.width, d.height), a = d.toDataURL("image/jpeg"), d = "JPEG"
        }
        if ("JPEG" !== d.toUpperCase()) throw Error("addImage currently only supports format 'JPEG', not '" + d + "'");
        var j;
        d = this.internal.collections.addImage_images;
        var i = this.internal.getCoordinateString,
            k = this.internal.getVerticalCoordinateString;
        if ("data:image/jpeg;base64," === a.substring(0, 23) && (a = atob(a.replace("data:image/jpeg;base64,", ""))), d)
            if (Object.keys) j = Object.keys(d).length;
            else {
                var l = d,
                    m = 0;
                for (j in l) l.hasOwnProperty(j) && m++;
                j = m
            } else j = 0, this.internal.collections.addImage_images = d = {}, this.internal.events.subscribe("putResources", b), this.internal.events.subscribe("putXobjectDict", c);
        a: {
            var n, l = a;
            if (255 === !l.charCodeAt(0) || 216 === !l.charCodeAt(1) || 255 === !l.charCodeAt(2) || 224 === !l.charCodeAt(3) || 74 === !l.charCodeAt(6) || 70 === !l.charCodeAt(7) || 73 === !l.charCodeAt(8) || 70 === !l.charCodeAt(9) || 0 === !l.charCodeAt(10)) throw Error("getJpegSize requires a binary jpeg file");
            n = 256 * l.charCodeAt(4) + l.charCodeAt(5);
            for (var m = 4, o = l.length; o > m;) {
                if (m += n, 255 !== l.charCodeAt(m)) throw Error("getJpegSize could not find the size of the image");
                if (192 === l.charCodeAt(m + 1) || 193 === l.charCodeAt(m + 1) || 194 === l.charCodeAt(m + 1) || 195 === l.charCodeAt(m + 1) || 196 === l.charCodeAt(m + 1) || 197 === l.charCodeAt(m + 1) || 198 === l.charCodeAt(m + 1) || 199 === l.charCodeAt(m + 1)) {
                    n = 256 * l.charCodeAt(m + 5) + l.charCodeAt(m + 6), l = 256 * l.charCodeAt(m + 7) + l.charCodeAt(m + 8), l = [l, n];
                    break a
                }
                m += 2, n = 256 * l.charCodeAt(m) + l.charCodeAt(m + 1)
            }
            l = void 0
        }
        return a = {
            w: l[0],
            h: l[1],
            cs: "DeviceRGB",
            bpc: 8,
            f: "DCTDecode",
            i: j,
            data: a
        },
        d[j] = a,
        g || h || (h = g = -96),
        0 > g && (g = -72 * a.w / g / this.internal.scaleFactor),
        0 > h && (h = -72 * a.h / h / this.internal.scaleFactor),
        0 === g && (g = h * a.w / a.h),
        0 === h && (h = g * a.h / a.w),
        this.internal.write("q", i(g), "0 0", i(h), i(e), k(f + h), "cm /I" + a.i, "Do Q"),
        this
    }
}(jsPDF.API),
function(a) {
    function b(a, b, c, d) {
        return this.pdf = a, this.x = b, this.y = c, this.settings = d, this.init(), this
    }

    function c(a) {
        var b = h[a];
        return b ? b : (b = {
            "xx-small": 9,
            "x-small": 11,
            small: 13,
            medium: 16,
            large: 19,
            "x-large": 23,
            "xx-large": 28,
            auto: 0
        }[a], void 0 !== b || (b = parseFloat(a)) ? h[a] = b / 16 : (b = a.match(/([\d\.]+)(px)/), h[a] = 3 === b.length ? parseFloat(b[1]) / 16 : 1))
    }

    function d(a, b, h) {
        var i, j = a.childNodes;
        i = $(a), a = {};
        for (var k, l = i.css("font-family").split(","), m = l.shift(); !k && m;) k = e[m.trim().toLowerCase()], m = l.shift();
        for (a["font-family"] = k || "times", a["font-style"] = g[i.css("font-style")] || "normal", k = f[i.css("font-weight")] || "normal", "bold" === k && (a["font-style"] = "normal" === a["font-style"] ? k : k + a["font-style"]), a["font-size"] = c(i.css("font-size")) || 1, a["line-height"] = c(i.css("line-height")) || 1, a.display = "inline" === i.css("display") ? "inline" : "block", "block" === a.display && (a["margin-top"] = c(i.css("margin-top")) || 0, a["margin-bottom"] = c(i.css("margin-bottom")) || 0, a["padding-top"] = c(i.css("padding-top")) || 0, a["padding-bottom"] = c(i.css("padding-bottom")) || 0), (k = "block" === a.display) && (b.setBlockBoundary(), b.setBlockStyle(a)), l = 0, m = j.length; m > l; l++)
            if (i = j[l], "object" == typeof i)
                if (1 === i.nodeType && "SCRIPT" != i.nodeName) {
                    var n = i,
                        o = b,
                        p = h,
                        q = !1,
                        r = void 0,
                        s = void 0,
                        t = p["#" + n.id];
                    if (t)
                        if ("function" == typeof t) q = t(n, o);
                        else
                            for (r = 0, s = t.length; !q && r !== s;) q = t[r](n, o), r++;
                    if (t = p[n.nodeName], !q && t)
                        if ("function" == typeof t) q = t(n, o);
                        else
                            for (r = 0, s = t.length; !q && r !== s;) q = t[r](n, o), r++;
                    q || d(i, b, h)
                } else 3 === i.nodeType && b.addText(i.nodeValue, a);
                else "string" == typeof i && b.addText(i, a);
        k && b.setBlockBoundary()
    }
    String.prototype.trim || (String.prototype.trim = function() {
        return this.replace(/^\s+|\s+$/g, "")
    }), String.prototype.trimLeft || (String.prototype.trimLeft = function() {
        return this.replace(/^\s+/g, "")
    }), String.prototype.trimRight || (String.prototype.trimRight = function() {
        return this.replace(/\s+$/g, "")
    }), b.prototype.init = function() {
        this.paragraph = {
            text: [],
            style: []
        }, this.pdf.internal.write("q")
    }, b.prototype.dispose = function() {
        return this.pdf.internal.write("Q"), {
            x: this.x,
            y: this.y
        }
    }, b.prototype.splitFragmentsIntoLines = function(a, b) {
        for (var c, d, e, f, g, h = this.pdf.internal.scaleFactor, i = {}, j = [], k = [j], l = 0, m = this.settings.width; a.length;)
            if (f = a.shift(), g = b.shift(), f)
                if (c = g["font-family"], d = g["font-style"], e = i[c + d], e || (e = this.pdf.internal.getFont(c, d).metadata.Unicode, i[c + d] = e), c = {
                    widths: e.widths,
                    kerning: e.kerning,
                    fontSize: 12 * g["font-size"],
                    textIndent: l
                }, d = this.pdf.getStringUnitWidth(f, c) * c.fontSize / h, l + d > m) {
                    for (f = this.pdf.splitTextToSize(f, m, c), j.push([f.shift(), g]); f.length;) j = [
                        [f.shift(), g]
                    ], k.push(j);
                    l = this.pdf.getStringUnitWidth(j[0][0], c) * c.fontSize / h
                } else j.push([f, g]), l += d;
        return k
    }, b.prototype.RenderTextFragment = function(a, b) {
        var c = this.pdf.internal.getFont(b["font-family"], b["font-style"]);
        this.pdf.internal.write("/" + c.id, (12 * b["font-size"]).toFixed(2), "Tf", "(" + this.pdf.internal.pdfEscape(a) + ") Tj")
    }, b.prototype.renderParagraph = function() {
        for (var a, b = this.paragraph.text, c = 0, d = b.length, e = !1, f = !1; !e && c !== d;)(a = b[c] = b[c].trimLeft()) && (e = !0), c++;
        for (c = d - 1; d && !f && -1 !== c;)(a = b[c] = b[c].trimRight()) && (f = !0),
        c--;
        for (e = /\s+$/g, f = !0, c = 0; c !== d; c++) a = b[c].replace(/\s+/g, " "), f && (a = a.trimLeft()), a && (f = e.test(a)), b[c] = a;
        if (c = this.paragraph.style, a = (d = this.paragraph.blockstyle) || {}, this.paragraph = {
            text: [],
            style: [],
            blockstyle: {},
            priorblockstyle: d
        }, b.join("").trim()) {
            b = this.splitFragmentsIntoLines(b, c), c = 12 / this.pdf.internal.scaleFactor, e = (Math.max((d["margin-top"] || 0) - (a["margin-bottom"] || 0), 0) + (d["padding-top"] || 0)) * c, d = ((d["margin-bottom"] || 0) + (d["padding-bottom"] || 0)) * c, a = this.pdf.internal.write;
            var g, h;
            for (this.y += e, a("q", "BT", this.pdf.internal.getCoordinateString(this.x), this.pdf.internal.getVerticalCoordinateString(this.y), "Td"); b.length;) {
                for (e = b.shift(), g = f = 0, h = e.length; g !== h; g++) e[g][0].trim() && (f = Math.max(f, e[g][1]["line-height"], e[g][1]["font-size"]));
                for (a(0, (-12 * f).toFixed(2), "Td"), g = 0, h = e.length; g !== h; g++) e[g][0] && this.RenderTextFragment(e[g][0], e[g][1]);
                this.y += f * c
            }
            a("ET", "Q"), this.y += d
        }
    }, b.prototype.setBlockBoundary = function() {
        this.renderParagraph()
    }, b.prototype.setBlockStyle = function(a) {
        this.paragraph.blockstyle = a
    }, b.prototype.addText = function(a, b) {
        this.paragraph.text.push(a), this.paragraph.style.push(b)
    };
    var e = {
        helvetica: "helvetica",
        "sans-serif": "helvetica",
        serif: "times",
        times: "times",
        "times new roman": "times",
        monospace: "courier",
        courier: "courier"
    }, f = {
            100: "normal",
            200: "normal",
            300: "normal",
            400: "normal",
            500: "bold",
            600: "bold",
            700: "bold",
            800: "bold",
            900: "bold",
            normal: "normal",
            bold: "bold",
            bolder: "bold",
            lighter: "normal"
        }, g = {
            normal: "normal",
            italic: "italic",
            oblique: "italic"
        }, h = {
            normal: 1
        };
    a.fromHTML = function(a, c, e, f) {
        if ("string" == typeof a) {
            var g = "jsPDFhtmlText" + Date.now().toString() + (1e3 * Math.random()).toFixed(0);
            $('<div style="position: absolute !important;clip: rect(1px 1px 1px 1px); /* IE6, IE7 */clip: rect(1px, 1px, 1px, 1px);padding:0 !important;border:0 !important;height: 1px !important;width: 1px !important; top:auto;left:-100px;overflow: hidden;"><iframe style="height:1px;width:1px" name="' + g + '" /></div>').appendTo(document.body), a = $(window.frames[g].document.body).html(a)[0]
        }
        return c = new b(this, c, e, f), d(a, c, f.elementHandlers), c.dispose()
    }
}(jsPDF.API),
function(a) {
    a.addSVG = function(a, b, c, d, e) {
        function f(a) {
            for (var b = parseFloat(a[1]), c = parseFloat(a[2]), d = [], e = 3, f = a.length; f > e;) "c" === a[e] ? (d.push([parseFloat(a[e + 1]), parseFloat(a[e + 2]), parseFloat(a[e + 3]), parseFloat(a[e + 4]), parseFloat(a[e + 5]), parseFloat(a[e + 6])]), e += 7) : "l" === a[e] ? (d.push([parseFloat(a[e + 1]), parseFloat(a[e + 2])]), e += 3) : e += 1;
            return [b, c, d]
        }
        if (void 0 === b || void 0 === b) throw Error("addSVG needs values for 'x' and 'y'");
        var g = function(a) {
            var b = a.createElement("iframe"),
                c = a.createElement("style");
            return c.type = "text/css", c.styleSheet ? c.styleSheet.cssText = ".jsPDF_sillysvg_iframe {display:none;position:absolute;}" : c.appendChild(a.createTextNode(".jsPDF_sillysvg_iframe {display:none;position:absolute;}")), a.getElementsByTagName("head")[0].appendChild(c), b.name = "childframe", b.setAttribute("width", 0), b.setAttribute("height", 0), b.setAttribute("frameborder", "0"), b.setAttribute("scrolling", "no"), b.setAttribute("seamless", "seamless"), b.setAttribute("class", "jsPDF_sillysvg_iframe"), a.body.appendChild(b), b
        }(document),
            g = function(a, b) {
                var c = (b.contentWindow || b.contentDocument).document;
                return c.write(a), c.close(), c.getElementsByTagName("svg")[0]
            }(a, g);
        a = [1, 1];
        var h = parseFloat(g.getAttribute("width")),
            i = parseFloat(g.getAttribute("height"));
        for (h && i && (d && e ? a = [d / h, e / i] : d ? a = [d / h, d / h] : e && (a = [e / i, e / i])), g = g.childNodes, d = 0, e = g.length; e > d; d++) h = g[d], h.tagName && "PATH" === h.tagName.toUpperCase() && (h = f(h.getAttribute("d").split(" ")), h[0] = h[0] * a[0] + b, h[1] = h[1] * a[1] + c, this.lines.call(this, h[2], h[0], h[1], a));
        return this
    }
}(jsPDF.API),
function(a) {
    var b = a.getCharWidthsArray = function(a, b) {
        b || (b = {});
        var c, d, e, f = b.widths ? b.widths : this.internal.getFont().metadata.Unicode.widths,
            g = f.fof ? f.fof : 1,
            h = b.kerning ? b.kerning : this.internal.getFont().metadata.Unicode.kerning,
            i = h.fof ? h.fof : 1,
            j = 0,
            k = f[0] || g,
            l = [];
        for (c = 0, d = a.length; d > c; c++) e = a.charCodeAt(c), l.push((f[e] || k) / g + (h[e] && h[e][j] || 0) / i), j = e;
        return l
    }, c = function(a) {
            for (var b = a.length, c = 0; b;) b--, c += a[b];
            return c
        };
    a.getStringUnitWidth = function(a, d) {
        return c(b.call(this, a, d))
    };
    var d = function(a, d, e) {
        e || (e = {});
        var f = b(" ", e)[0],
            g = a.split(" "),
            h = [];
        a = [h];
        var i, j, k, l, m = e.textIndent || 0,
            n = 0,
            o = 0;
        for (k = 0, l = g.length; l > k; k++) {
            if (i = g[k], j = b(i, e), o = c(j), m + n + o > d) {
                if (o > d) {
                    for (var o = i, p = j, q = d, r = [], s = 0, t = o.length, u = 0; s !== t && u + p[s] < d - (m + n);) u += p[s], s++;
                    for (r.push(o.slice(0, s)), m = s, u = 0; s !== t;) u + p[s] > q && (r.push(o.slice(m, s)), u = 0, m = s), u += p[s], s++;
                    for (m !== s && r.push(o.slice(m, s)), m = r, h.push(m.shift()), h = [m.pop()]; m.length;) a.push([m.shift()]);
                    o = c(j.slice(i.length - h[0].length))
                } else h = [i];
                a.push(h), m = o
            } else h.push(i), m += n + o;
            n = f
        }
        for (d = [], k = 0, l = a.length; l > k; k++) d.push(a[k].join(" "));
        return d
    };
    a.splitTextToSize = function(a, b, c) {
        c || (c = {});
        var e, f = c.fontSize || this.internal.getFontSize(),
            g = c;
        e = {
            0: 1
        };
        var h = {};
        for (g.widths && g.kerning ? e = {
            widths: g.widths,
            kerning: g.kerning
        } : (g = this.internal.getFont(g.fontName, g.fontStyle), e = g.metadata.Unicode ? {
            widths: g.metadata.Unicode.widths || e,
            kerning: g.metadata.Unicode.kerning || h
        } : {
            widths: e,
            kerning: h
        }), a = a.match(/[\n\r]/) ? a.split(/\r\n|\r|\n/g) : [a], b = 1 * this.internal.scaleFactor * b / f, e.textIndent = c.textIndent ? 1 * c.textIndent * this.internal.scaleFactor / f : 0, h = [], c = 0, f = a.length; f > c; c++) h = h.concat(d(a[c], b, e));
        return h
    }
}(jsPDF.API),
function(a) {
    var b = function(a) {
        for (var b = {}, c = 0; 16 > c; c++) b["klmnopqrstuvwxyz" [c]] = "0123456789abcdef" [c];
        for (var d, e, f, g = {}, h = 1, i = g, j = [], k = "", l = "", m = a.length - 1, c = 1; c != m;) e = a[c], c += 1, "'" == e ? d ? (f = d.join(""), d = void 0) : d = [] : d ? d.push(e) : "{" == e ? (j.push([i, f]), i = {}, f = void 0) : "}" == e ? (e = j.pop(), e[0][e[1]] = i, f = void 0, i = e[0]) : "-" == e ? h = -1 : void 0 === f ? b.hasOwnProperty(e) ? (k += b[e], f = parseInt(k, 16) * h, h = 1, k = "") : k += e : b.hasOwnProperty(e) ? (l += b[e], i[f] = parseInt(l, 16) * h, h = 1, f = void 0, l = "") : l += e;
        return g
    }, c = {
            codePages: ["WinAnsiEncoding"],
            WinAnsiEncoding: b("{19m8n201n9q201o9r201s9l201t9m201u8m201w9n201x9o201y8o202k8q202l8r202m9p202q8p20aw8k203k8t203t8v203u9v2cq8s212m9t15m8w15n9w2dw9s16k8u16l9u17s9z17x8y17y9y}")
        }, d = {
            Unicode: {
                Courier: c,
                "Courier-Bold": c,
                "Courier-BoldOblique": c,
                "Courier-Oblique": c,
                Helvetica: c,
                "Helvetica-Bold": c,
                "Helvetica-BoldOblique": c,
                "Helvetica-Oblique": c,
                "Times-Roman": c,
                "Times-Bold": c,
                "Times-BoldItalic": c,
                "Times-Italic": c
            }
        }, e = {
            Unicode: {
                "Courier-Oblique": b("{'widths'{k3w'fof'6o}'kerning'{'fof'-6o}}"),
                "Times-BoldItalic": b("{'widths'{k3o2q4ycx2r201n3m201o6o201s2l201t2l201u2l201w3m201x3m201y3m2k1t2l2r202m2n2n3m2o3m2p5n202q6o2r1w2s2l2t2l2u3m2v3t2w1t2x2l2y1t2z1w3k3m3l3m3m3m3n3m3o3m3p3m3q3m3r3m3s3m203t2l203u2l3v2l3w3t3x3t3y3t3z3m4k5n4l4m4m4m4n4m4o4s4p4m4q4m4r4s4s4y4t2r4u3m4v4m4w3x4x5t4y4s4z4s5k3x5l4s5m4m5n3r5o3x5p4s5q4m5r5t5s4m5t3x5u3x5v2l5w1w5x2l5y3t5z3m6k2l6l3m6m3m6n2w6o3m6p2w6q2l6r3m6s3r6t1w6u1w6v3m6w1w6x4y6y3r6z3m7k3m7l3m7m2r7n2r7o1w7p3r7q2w7r4m7s3m7t2w7u2r7v2n7w1q7x2n7y3t202l3mcl4mal2ram3man3mao3map3mar3mas2lat4uau1uav3maw3way4uaz2lbk2sbl3t'fof'6obo2lbp3tbq3mbr1tbs2lbu1ybv3mbz3mck4m202k3mcm4mcn4mco4mcp4mcq5ycr4mcs4mct4mcu4mcv4mcw2r2m3rcy2rcz2rdl4sdm4sdn4sdo4sdp4sdq4sds4sdt4sdu4sdv4sdw4sdz3mek3mel3mem3men3meo3mep3meq4ser2wes2wet2weu2wev2wew1wex1wey1wez1wfl3rfm3mfn3mfo3mfp3mfq3mfr3tfs3mft3rfu3rfv3rfw3rfz2w203k6o212m6o2dw2l2cq2l3t3m3u2l17s3x19m3m}'kerning'{cl{4qu5kt5qt5rs17ss5ts}201s{201ss}201t{cks4lscmscnscoscpscls2wu2yu201ts}201x{2wu2yu}2k{201ts}2w{4qx5kx5ou5qx5rs17su5tu}2x{17su5tu5ou}2y{4qx5kx5ou5qx5rs17ss5ts}'fof'-6ofn{17sw5tw5ou5qw5rs}7t{cksclscmscnscoscps4ls}3u{17su5tu5os5qs}3v{17su5tu5os5qs}7p{17su5tu}ck{4qu5kt5qt5rs17ss5ts}4l{4qu5kt5qt5rs17ss5ts}cm{4qu5kt5qt5rs17ss5ts}cn{4qu5kt5qt5rs17ss5ts}co{4qu5kt5qt5rs17ss5ts}cp{4qu5kt5qt5rs17ss5ts}6l{4qu5ou5qw5rt17su5tu}5q{ckuclucmucnucoucpu4lu}5r{ckuclucmucnucoucpu4lu}7q{cksclscmscnscoscps4ls}6p{4qu5ou5qw5rt17sw5tw}ek{4qu5ou5qw5rt17su5tu}el{4qu5ou5qw5rt17su5tu}em{4qu5ou5qw5rt17su5tu}en{4qu5ou5qw5rt17su5tu}eo{4qu5ou5qw5rt17su5tu}ep{4qu5ou5qw5rt17su5tu}es{17ss5ts5qs4qu}et{4qu5ou5qw5rt17sw5tw}eu{4qu5ou5qw5rt17ss5ts}ev{17ss5ts5qs4qu}6z{17sw5tw5ou5qw5rs}fm{17sw5tw5ou5qw5rs}7n{201ts}fo{17sw5tw5ou5qw5rs}fp{17sw5tw5ou5qw5rs}fq{17sw5tw5ou5qw5rs}7r{cksclscmscnscoscps4ls}fs{17sw5tw5ou5qw5rs}ft{17su5tu}fu{17su5tu}fv{17su5tu}fw{17su5tu}fz{cksclscmscnscoscps4ls}}}"),
                "Helvetica-Bold": b("{'widths'{k3s2q4scx1w201n3r201o6o201s1w201t1w201u1w201w3m201x3m201y3m2k1w2l2l202m2n2n3r2o3r2p5t202q6o2r1s2s2l2t2l2u2r2v3u2w1w2x2l2y1w2z1w3k3r3l3r3m3r3n3r3o3r3p3r3q3r3r3r3s3r203t2l203u2l3v2l3w3u3x3u3y3u3z3x4k6l4l4s4m4s4n4s4o4s4p4m4q3x4r4y4s4s4t1w4u3r4v4s4w3x4x5n4y4s4z4y5k4m5l4y5m4s5n4m5o3x5p4s5q4m5r5y5s4m5t4m5u3x5v2l5w1w5x2l5y3u5z3r6k2l6l3r6m3x6n3r6o3x6p3r6q2l6r3x6s3x6t1w6u1w6v3r6w1w6x5t6y3x6z3x7k3x7l3x7m2r7n3r7o2l7p3x7q3r7r4y7s3r7t3r7u3m7v2r7w1w7x2r7y3u202l3rcl4sal2lam3ran3rao3rap3rar3ras2lat4tau2pav3raw3uay4taz2lbk2sbl3u'fof'6obo2lbp3xbq3rbr1wbs2lbu2obv3rbz3xck4s202k3rcm4scn4sco4scp4scq6ocr4scs4mct4mcu4mcv4mcw1w2m2zcy1wcz1wdl4sdm4ydn4ydo4ydp4ydq4yds4ydt4sdu4sdv4sdw4sdz3xek3rel3rem3ren3reo3rep3req5ter3res3ret3reu3rev3rew1wex1wey1wez1wfl3xfm3xfn3xfo3xfp3xfq3xfr3ufs3xft3xfu3xfv3xfw3xfz3r203k6o212m6o2dw2l2cq2l3t3r3u2l17s4m19m3r}'kerning'{cl{4qs5ku5ot5qs17sv5tv}201t{2ww4wy2yw}201w{2ks}201x{2ww4wy2yw}2k{201ts201xs}2w{7qs4qu5kw5os5qw5rs17su5tu7tsfzs}2x{5ow5qs}2y{7qs4qu5kw5os5qw5rs17su5tu7tsfzs}'fof'-6o7p{17su5tu5ot}ck{4qs5ku5ot5qs17sv5tv}4l{4qs5ku5ot5qs17sv5tv}cm{4qs5ku5ot5qs17sv5tv}cn{4qs5ku5ot5qs17sv5tv}co{4qs5ku5ot5qs17sv5tv}cp{4qs5ku5ot5qs17sv5tv}6l{17st5tt5os}17s{2kwclvcmvcnvcovcpv4lv4wwckv}5o{2kucltcmtcntcotcpt4lt4wtckt}5q{2ksclscmscnscoscps4ls4wvcks}5r{2ks4ws}5t{2kwclvcmvcnvcovcpv4lv4wwckv}eo{17st5tt5os}fu{17su5tu5ot}6p{17ss5ts}ek{17st5tt5os}el{17st5tt5os}em{17st5tt5os}en{17st5tt5os}6o{201ts}ep{17st5tt5os}es{17ss5ts}et{17ss5ts}eu{17ss5ts}ev{17ss5ts}6z{17su5tu5os5qt}fm{17su5tu5os5qt}fn{17su5tu5os5qt}fo{17su5tu5os5qt}fp{17su5tu5os5qt}fq{17su5tu5os5qt}fs{17su5tu5os5qt}ft{17su5tu5ot}7m{5os}fv{17su5tu5ot}fw{17su5tu5ot}}}"),
                Courier: b("{'widths'{k3w'fof'6o}'kerning'{'fof'-6o}}"),
                "Courier-BoldOblique": b("{'widths'{k3w'fof'6o}'kerning'{'fof'-6o}}"),
                "Times-Bold": b("{'widths'{k3q2q5ncx2r201n3m201o6o201s2l201t2l201u2l201w3m201x3m201y3m2k1t2l2l202m2n2n3m2o3m2p6o202q6o2r1w2s2l2t2l2u3m2v3t2w1t2x2l2y1t2z1w3k3m3l3m3m3m3n3m3o3m3p3m3q3m3r3m3s3m203t2l203u2l3v2l3w3t3x3t3y3t3z3m4k5x4l4s4m4m4n4s4o4s4p4m4q3x4r4y4s4y4t2r4u3m4v4y4w4m4x5y4y4s4z4y5k3x5l4y5m4s5n3r5o4m5p4s5q4s5r6o5s4s5t4s5u4m5v2l5w1w5x2l5y3u5z3m6k2l6l3m6m3r6n2w6o3r6p2w6q2l6r3m6s3r6t1w6u2l6v3r6w1w6x5n6y3r6z3m7k3r7l3r7m2w7n2r7o2l7p3r7q3m7r4s7s3m7t3m7u2w7v2r7w1q7x2r7y3o202l3mcl4sal2lam3man3mao3map3mar3mas2lat4uau1yav3maw3tay4uaz2lbk2sbl3t'fof'6obo2lbp3rbr1tbs2lbu2lbv3mbz3mck4s202k3mcm4scn4sco4scp4scq6ocr4scs4mct4mcu4mcv4mcw2r2m3rcy2rcz2rdl4sdm4ydn4ydo4ydp4ydq4yds4ydt4sdu4sdv4sdw4sdz3rek3mel3mem3men3meo3mep3meq4ser2wes2wet2weu2wev2wew1wex1wey1wez1wfl3rfm3mfn3mfo3mfp3mfq3mfr3tfs3mft3rfu3rfv3rfw3rfz3m203k6o212m6o2dw2l2cq2l3t3m3u2l17s4s19m3m}'kerning'{cl{4qt5ks5ot5qy5rw17sv5tv}201t{cks4lscmscnscoscpscls4wv}2k{201ts}2w{4qu5ku7mu5os5qx5ru17su5tu}2x{17su5tu5ou5qs}2y{4qv5kv7mu5ot5qz5ru17su5tu}'fof'-6o7t{cksclscmscnscoscps4ls}3u{17su5tu5os5qu}3v{17su5tu5os5qu}fu{17su5tu5ou5qu}7p{17su5tu5ou5qu}ck{4qt5ks5ot5qy5rw17sv5tv}4l{4qt5ks5ot5qy5rw17sv5tv}cm{4qt5ks5ot5qy5rw17sv5tv}cn{4qt5ks5ot5qy5rw17sv5tv}co{4qt5ks5ot5qy5rw17sv5tv}cp{4qt5ks5ot5qy5rw17sv5tv}6l{17st5tt5ou5qu}17s{ckuclucmucnucoucpu4lu4wu}5o{ckuclucmucnucoucpu4lu4wu}5q{ckzclzcmzcnzcozcpz4lz4wu}5r{ckxclxcmxcnxcoxcpx4lx4wu}5t{ckuclucmucnucoucpu4lu4wu}7q{ckuclucmucnucoucpu4lu}6p{17sw5tw5ou5qu}ek{17st5tt5qu}el{17st5tt5ou5qu}em{17st5tt5qu}en{17st5tt5qu}eo{17st5tt5qu}ep{17st5tt5ou5qu}es{17ss5ts5qu}et{17sw5tw5ou5qu}eu{17sw5tw5ou5qu}ev{17ss5ts5qu}6z{17sw5tw5ou5qu5rs}fm{17sw5tw5ou5qu5rs}fn{17sw5tw5ou5qu5rs}fo{17sw5tw5ou5qu5rs}fp{17sw5tw5ou5qu5rs}fq{17sw5tw5ou5qu5rs}7r{cktcltcmtcntcotcpt4lt5os}fs{17sw5tw5ou5qu5rs}ft{17su5tu5ou5qu}7m{5os}fv{17su5tu5ou5qu}fw{17su5tu5ou5qu}fz{cksclscmscnscoscps4ls}}}"),
                Helvetica: b("{'widths'{k3p2q4mcx1w201n3r201o6o201s1q201t1q201u1q201w2l201x2l201y2l2k1w2l1w202m2n2n3r2o3r2p5t202q6o2r1n2s2l2t2l2u2r2v3u2w1w2x2l2y1w2z1w3k3r3l3r3m3r3n3r3o3r3p3r3q3r3r3r3s3r203t2l203u2l3v1w3w3u3x3u3y3u3z3r4k6p4l4m4m4m4n4s4o4s4p4m4q3x4r4y4s4s4t1w4u3m4v4m4w3r4x5n4y4s4z4y5k4m5l4y5m4s5n4m5o3x5p4s5q4m5r5y5s4m5t4m5u3x5v1w5w1w5x1w5y2z5z3r6k2l6l3r6m3r6n3m6o3r6p3r6q1w6r3r6s3r6t1q6u1q6v3m6w1q6x5n6y3r6z3r7k3r7l3r7m2l7n3m7o1w7p3r7q3m7r4s7s3m7t3m7u3m7v2l7w1u7x2l7y3u202l3rcl4mal2lam3ran3rao3rap3rar3ras2lat4tau2pav3raw3uay4taz2lbk2sbl3u'fof'6obo2lbp3rbr1wbs2lbu2obv3rbz3xck4m202k3rcm4mcn4mco4mcp4mcq6ocr4scs4mct4mcu4mcv4mcw1w2m2ncy1wcz1wdl4sdm4ydn4ydo4ydp4ydq4yds4ydt4sdu4sdv4sdw4sdz3xek3rel3rem3ren3reo3rep3req5ter3mes3ret3reu3rev3rew1wex1wey1wez1wfl3rfm3rfn3rfo3rfp3rfq3rfr3ufs3xft3rfu3rfv3rfw3rfz3m203k6o212m6o2dw2l2cq2l3t3r3u1w17s4m19m3r}'kerning'{5q{4wv}cl{4qs5kw5ow5qs17sv5tv}201t{2wu4w1k2yu}201x{2wu4wy2yu}17s{2ktclucmucnu4otcpu4lu4wycoucku}2w{7qs4qz5k1m17sy5ow5qx5rsfsu5ty7tufzu}2x{17sy5ty5oy5qs}2y{7qs4qz5k1m17sy5ow5qx5rsfsu5ty7tufzu}'fof'-6o7p{17sv5tv5ow}ck{4qs5kw5ow5qs17sv5tv}4l{4qs5kw5ow5qs17sv5tv}cm{4qs5kw5ow5qs17sv5tv}cn{4qs5kw5ow5qs17sv5tv}co{4qs5kw5ow5qs17sv5tv}cp{4qs5kw5ow5qs17sv5tv}6l{17sy5ty5ow}do{17st5tt}4z{17st5tt}7s{fst}dm{17st5tt}dn{17st5tt}5o{ckwclwcmwcnwcowcpw4lw4wv}dp{17st5tt}dq{17st5tt}7t{5ow}ds{17st5tt}5t{2ktclucmucnu4otcpu4lu4wycoucku}fu{17sv5tv5ow}6p{17sy5ty5ow5qs}ek{17sy5ty5ow}el{17sy5ty5ow}em{17sy5ty5ow}en{5ty}eo{17sy5ty5ow}ep{17sy5ty5ow}es{17sy5ty5qs}et{17sy5ty5ow5qs}eu{17sy5ty5ow5qs}ev{17sy5ty5ow5qs}6z{17sy5ty5ow5qs}fm{17sy5ty5ow5qs}fn{17sy5ty5ow5qs}fo{17sy5ty5ow5qs}fp{17sy5ty5qs}fq{17sy5ty5ow5qs}7r{5ow}fs{17sy5ty5ow5qs}ft{17sv5tv5ow}7m{5ow}fv{17sv5tv5ow}fw{17sv5tv5ow}}}"),
                "Helvetica-BoldOblique": b("{'widths'{k3s2q4scx1w201n3r201o6o201s1w201t1w201u1w201w3m201x3m201y3m2k1w2l2l202m2n2n3r2o3r2p5t202q6o2r1s2s2l2t2l2u2r2v3u2w1w2x2l2y1w2z1w3k3r3l3r3m3r3n3r3o3r3p3r3q3r3r3r3s3r203t2l203u2l3v2l3w3u3x3u3y3u3z3x4k6l4l4s4m4s4n4s4o4s4p4m4q3x4r4y4s4s4t1w4u3r4v4s4w3x4x5n4y4s4z4y5k4m5l4y5m4s5n4m5o3x5p4s5q4m5r5y5s4m5t4m5u3x5v2l5w1w5x2l5y3u5z3r6k2l6l3r6m3x6n3r6o3x6p3r6q2l6r3x6s3x6t1w6u1w6v3r6w1w6x5t6y3x6z3x7k3x7l3x7m2r7n3r7o2l7p3x7q3r7r4y7s3r7t3r7u3m7v2r7w1w7x2r7y3u202l3rcl4sal2lam3ran3rao3rap3rar3ras2lat4tau2pav3raw3uay4taz2lbk2sbl3u'fof'6obo2lbp3xbq3rbr1wbs2lbu2obv3rbz3xck4s202k3rcm4scn4sco4scp4scq6ocr4scs4mct4mcu4mcv4mcw1w2m2zcy1wcz1wdl4sdm4ydn4ydo4ydp4ydq4yds4ydt4sdu4sdv4sdw4sdz3xek3rel3rem3ren3reo3rep3req5ter3res3ret3reu3rev3rew1wex1wey1wez1wfl3xfm3xfn3xfo3xfp3xfq3xfr3ufs3xft3xfu3xfv3xfw3xfz3r203k6o212m6o2dw2l2cq2l3t3r3u2l17s4m19m3r}'kerning'{cl{4qs5ku5ot5qs17sv5tv}201t{2ww4wy2yw}201w{2ks}201x{2ww4wy2yw}2k{201ts201xs}2w{7qs4qu5kw5os5qw5rs17su5tu7tsfzs}2x{5ow5qs}2y{7qs4qu5kw5os5qw5rs17su5tu7tsfzs}'fof'-6o7p{17su5tu5ot}ck{4qs5ku5ot5qs17sv5tv}4l{4qs5ku5ot5qs17sv5tv}cm{4qs5ku5ot5qs17sv5tv}cn{4qs5ku5ot5qs17sv5tv}co{4qs5ku5ot5qs17sv5tv}cp{4qs5ku5ot5qs17sv5tv}6l{17st5tt5os}17s{2kwclvcmvcnvcovcpv4lv4wwckv}5o{2kucltcmtcntcotcpt4lt4wtckt}5q{2ksclscmscnscoscps4ls4wvcks}5r{2ks4ws}5t{2kwclvcmvcnvcovcpv4lv4wwckv}eo{17st5tt5os}fu{17su5tu5ot}6p{17ss5ts}ek{17st5tt5os}el{17st5tt5os}em{17st5tt5os}en{17st5tt5os}6o{201ts}ep{17st5tt5os}es{17ss5ts}et{17ss5ts}eu{17ss5ts}ev{17ss5ts}6z{17su5tu5os5qt}fm{17su5tu5os5qt}fn{17su5tu5os5qt}fo{17su5tu5os5qt}fp{17su5tu5os5qt}fq{17su5tu5os5qt}fs{17su5tu5os5qt}ft{17su5tu5ot}7m{5os}fv{17su5tu5ot}fw{17su5tu5ot}}}"),
                "Courier-Bold": b("{'widths'{k3w'fof'6o}'kerning'{'fof'-6o}}"),
                "Times-Italic": b("{'widths'{k3n2q4ycx2l201n3m201o5t201s2l201t2l201u2l201w3r201x3r201y3r2k1t2l2l202m2n2n3m2o3m2p5n202q5t2r1p2s2l2t2l2u3m2v4n2w1t2x2l2y1t2z1w3k3m3l3m3m3m3n3m3o3m3p3m3q3m3r3m3s3m203t2l203u2l3v2l3w4n3x4n3y4n3z3m4k5w4l3x4m3x4n4m4o4s4p3x4q3x4r4s4s4s4t2l4u2w4v4m4w3r4x5n4y4m4z4s5k3x5l4s5m3x5n3m5o3r5p4s5q3x5r5n5s3x5t3r5u3r5v2r5w1w5x2r5y2u5z3m6k2l6l3m6m3m6n2w6o3m6p2w6q1w6r3m6s3m6t1w6u1w6v2w6w1w6x4s6y3m6z3m7k3m7l3m7m2r7n2r7o1w7p3m7q2w7r4m7s2w7t2w7u2r7v2s7w1v7x2s7y3q202l3mcl3xal2ram3man3mao3map3mar3mas2lat4wau1vav3maw4nay4waz2lbk2sbl4n'fof'6obo2lbp3mbq3obr1tbs2lbu1zbv3mbz3mck3x202k3mcm3xcn3xco3xcp3xcq5tcr4mcs3xct3xcu3xcv3xcw2l2m2ucy2lcz2ldl4mdm4sdn4sdo4sdp4sdq4sds4sdt4sdu4sdv4sdw4sdz3mek3mel3mem3men3meo3mep3meq4mer2wes2wet2weu2wev2wew1wex1wey1wez1wfl3mfm3mfn3mfo3mfp3mfq3mfr4nfs3mft3mfu3mfv3mfw3mfz2w203k6o212m6m2dw2l2cq2l3t3m3u2l17s3r19m3m}'kerning'{cl{5kt4qw}201s{201sw}201t{201tw2wy2yy6q-t}201x{2wy2yy}2k{201tw}2w{7qs4qy7rs5ky7mw5os5qx5ru17su5tu}2x{17ss5ts5os}2y{7qs4qy7rs5ky7mw5os5qx5ru17su5tu}'fof'-6o6t{17ss5ts5qs}7t{5os}3v{5qs}7p{17su5tu5qs}ck{5kt4qw}4l{5kt4qw}cm{5kt4qw}cn{5kt4qw}co{5kt4qw}cp{5kt4qw}6l{4qs5ks5ou5qw5ru17su5tu}17s{2ks}5q{ckvclvcmvcnvcovcpv4lv}5r{ckuclucmucnucoucpu4lu}5t{2ks}6p{4qs5ks5ou5qw5ru17su5tu}ek{4qs5ks5ou5qw5ru17su5tu}el{4qs5ks5ou5qw5ru17su5tu}em{4qs5ks5ou5qw5ru17su5tu}en{4qs5ks5ou5qw5ru17su5tu}eo{4qs5ks5ou5qw5ru17su5tu}ep{4qs5ks5ou5qw5ru17su5tu}es{5ks5qs4qs}et{4qs5ks5ou5qw5ru17su5tu}eu{4qs5ks5qw5ru17su5tu}ev{5ks5qs4qs}ex{17ss5ts5qs}6z{4qv5ks5ou5qw5ru17su5tu}fm{4qv5ks5ou5qw5ru17su5tu}fn{4qv5ks5ou5qw5ru17su5tu}fo{4qv5ks5ou5qw5ru17su5tu}fp{4qv5ks5ou5qw5ru17su5tu}fq{4qv5ks5ou5qw5ru17su5tu}7r{5os}fs{4qv5ks5ou5qw5ru17su5tu}ft{17su5tu5qs}fu{17su5tu5qs}fv{17su5tu5qs}fw{17su5tu5qs}}}"),
                "Times-Roman": b("{'widths'{k3n2q4ycx2l201n3m201o6o201s2l201t2l201u2l201w2w201x2w201y2w2k1t2l2l202m2n2n3m2o3m2p5n202q6o2r1m2s2l2t2l2u3m2v3s2w1t2x2l2y1t2z1w3k3m3l3m3m3m3n3m3o3m3p3m3q3m3r3m3s3m203t2l203u2l3v1w3w3s3x3s3y3s3z2w4k5w4l4s4m4m4n4m4o4s4p3x4q3r4r4s4s4s4t2l4u2r4v4s4w3x4x5t4y4s4z4s5k3r5l4s5m4m5n3r5o3x5p4s5q4s5r5y5s4s5t4s5u3x5v2l5w1w5x2l5y2z5z3m6k2l6l2w6m3m6n2w6o3m6p2w6q2l6r3m6s3m6t1w6u1w6v3m6w1w6x4y6y3m6z3m7k3m7l3m7m2l7n2r7o1w7p3m7q3m7r4s7s3m7t3m7u2w7v3k7w1o7x3k7y3q202l3mcl4sal2lam3man3mao3map3mar3mas2lat4wau1vav3maw3say4waz2lbk2sbl3s'fof'6obo2lbp3mbq2xbr1tbs2lbu1zbv3mbz2wck4s202k3mcm4scn4sco4scp4scq5tcr4mcs3xct3xcu3xcv3xcw2l2m2tcy2lcz2ldl4sdm4sdn4sdo4sdp4sdq4sds4sdt4sdu4sdv4sdw4sdz3mek2wel2wem2wen2weo2wep2weq4mer2wes2wet2weu2wev2wew1wex1wey1wez1wfl3mfm3mfn3mfo3mfp3mfq3mfr3sfs3mft3mfu3mfv3mfw3mfz3m203k6o212m6m2dw2l2cq2l3t3m3u1w17s4s19m3m}'kerning'{cl{4qs5ku17sw5ou5qy5rw201ss5tw201ws}201s{201ss}201t{ckw4lwcmwcnwcowcpwclw4wu201ts}2k{201ts}2w{4qs5kw5os5qx5ru17sx5tx}2x{17sw5tw5ou5qu}2y{4qs5kw5os5qx5ru17sx5tx}'fof'-6o7t{ckuclucmucnucoucpu4lu5os5rs}3u{17su5tu5qs}3v{17su5tu5qs}7p{17sw5tw5qs}ck{4qs5ku17sw5ou5qy5rw201ss5tw201ws}4l{4qs5ku17sw5ou5qy5rw201ss5tw201ws}cm{4qs5ku17sw5ou5qy5rw201ss5tw201ws}cn{4qs5ku17sw5ou5qy5rw201ss5tw201ws}co{4qs5ku17sw5ou5qy5rw201ss5tw201ws}cp{4qs5ku17sw5ou5qy5rw201ss5tw201ws}6l{17su5tu5os5qw5rs}17s{2ktclvcmvcnvcovcpv4lv4wuckv}5o{ckwclwcmwcnwcowcpw4lw4wu}5q{ckyclycmycnycoycpy4ly4wu5ms}5r{cktcltcmtcntcotcpt4lt4ws}5t{2ktclvcmvcnvcovcpv4lv4wuckv}7q{cksclscmscnscoscps4ls}6p{17su5tu5qw5rs}ek{5qs5rs}el{17su5tu5os5qw5rs}em{17su5tu5os5qs5rs}en{17su5qs5rs}eo{5qs5rs}ep{17su5tu5os5qw5rs}es{5qs}et{17su5tu5qw5rs}eu{17su5tu5qs5rs}ev{5qs}6z{17sv5tv5os5qx5rs}fm{5os5qt5rs}fn{17sv5tv5os5qx5rs}fo{17sv5tv5os5qx5rs}fp{5os5qt5rs}fq{5os5qt5rs}7r{ckuclucmucnucoucpu4lu5os}fs{17sv5tv5os5qx5rs}ft{17ss5ts5qs}fu{17sw5tw5qs}fv{17sw5tw5qs}fw{17ss5ts5qs}fz{ckuclucmucnucoucpu4lu5os5rs}}}"),
                "Helvetica-Oblique": b("{'widths'{k3p2q4mcx1w201n3r201o6o201s1q201t1q201u1q201w2l201x2l201y2l2k1w2l1w202m2n2n3r2o3r2p5t202q6o2r1n2s2l2t2l2u2r2v3u2w1w2x2l2y1w2z1w3k3r3l3r3m3r3n3r3o3r3p3r3q3r3r3r3s3r203t2l203u2l3v1w3w3u3x3u3y3u3z3r4k6p4l4m4m4m4n4s4o4s4p4m4q3x4r4y4s4s4t1w4u3m4v4m4w3r4x5n4y4s4z4y5k4m5l4y5m4s5n4m5o3x5p4s5q4m5r5y5s4m5t4m5u3x5v1w5w1w5x1w5y2z5z3r6k2l6l3r6m3r6n3m6o3r6p3r6q1w6r3r6s3r6t1q6u1q6v3m6w1q6x5n6y3r6z3r7k3r7l3r7m2l7n3m7o1w7p3r7q3m7r4s7s3m7t3m7u3m7v2l7w1u7x2l7y3u202l3rcl4mal2lam3ran3rao3rap3rar3ras2lat4tau2pav3raw3uay4taz2lbk2sbl3u'fof'6obo2lbp3rbr1wbs2lbu2obv3rbz3xck4m202k3rcm4mcn4mco4mcp4mcq6ocr4scs4mct4mcu4mcv4mcw1w2m2ncy1wcz1wdl4sdm4ydn4ydo4ydp4ydq4yds4ydt4sdu4sdv4sdw4sdz3xek3rel3rem3ren3reo3rep3req5ter3mes3ret3reu3rev3rew1wex1wey1wez1wfl3rfm3rfn3rfo3rfp3rfq3rfr3ufs3xft3rfu3rfv3rfw3rfz3m203k6o212m6o2dw2l2cq2l3t3r3u1w17s4m19m3r}'kerning'{5q{4wv}cl{4qs5kw5ow5qs17sv5tv}201t{2wu4w1k2yu}201x{2wu4wy2yu}17s{2ktclucmucnu4otcpu4lu4wycoucku}2w{7qs4qz5k1m17sy5ow5qx5rsfsu5ty7tufzu}2x{17sy5ty5oy5qs}2y{7qs4qz5k1m17sy5ow5qx5rsfsu5ty7tufzu}'fof'-6o7p{17sv5tv5ow}ck{4qs5kw5ow5qs17sv5tv}4l{4qs5kw5ow5qs17sv5tv}cm{4qs5kw5ow5qs17sv5tv}cn{4qs5kw5ow5qs17sv5tv}co{4qs5kw5ow5qs17sv5tv}cp{4qs5kw5ow5qs17sv5tv}6l{17sy5ty5ow}do{17st5tt}4z{17st5tt}7s{fst}dm{17st5tt}dn{17st5tt}5o{ckwclwcmwcnwcowcpw4lw4wv}dp{17st5tt}dq{17st5tt}7t{5ow}ds{17st5tt}5t{2ktclucmucnu4otcpu4lu4wycoucku}fu{17sv5tv5ow}6p{17sy5ty5ow5qs}ek{17sy5ty5ow}el{17sy5ty5ow}em{17sy5ty5ow}en{5ty}eo{17sy5ty5ow}ep{17sy5ty5ow}es{17sy5ty5qs}et{17sy5ty5ow5qs}eu{17sy5ty5ow5qs}ev{17sy5ty5ow5qs}6z{17sy5ty5ow5qs}fm{17sy5ty5ow5qs}fn{17sy5ty5ow5qs}fo{17sy5ty5ow5qs}fp{17sy5ty5qs}fq{17sy5ty5ow5qs}7r{5ow}fs{17sy5ty5ow5qs}ft{17sv5tv5ow}7m{5ow}fv{17sv5tv5ow}fw{17sv5tv5ow}}}")
            }
        };
    a.events.push(["addFonts",
        function(a) {
            var b, c, f, g;
            for (c in a.fonts) a.fonts.hasOwnProperty(c) && (b = a.fonts[c], (f = e.Unicode[b.PostScriptName]) && (g = b.metadata.Unicode ? b.metadata.Unicode : b.metadata.Unicode = {}, g.widths = f.widths, g.kerning = f.kerning), (f = d.Unicode[b.PostScriptName]) && (g = b.metadata.Unicode ? b.metadata.Unicode : b.metadata.Unicode = {}, g.encoding = f, f.codePages && f.codePages.length && (b.encoding = f.codePages[0])))
        }
    ])
}(jsPDF.API),
function(a) {
    var b, c, d, e, f = {
            x: void 0,
            y: void 0,
            w: void 0,
            h: void 0,
            ln: void 0
        }, g = 1;
    a.setHeaderFunction = function(a) {
        e = a
    }, a.getTextDimensions = function(a) {
        b = this.internal.getFont().fontName, c = this.internal.getFontSize(), d = this.internal.getFont().fontStyle;
        var e, f = 19.049976 / 25.4;
        return e = document.createElement("font"), e.id = "jsPDFCell", e.style.fontStyle = d, e.style.fontName = b, e.style.fontSize = c + "pt", e.innerText = a, document.body.appendChild(e), a = {
            w: (e.offsetWidth + 1) * f,
            h: (e.offsetHeight + 1) * f
        }, document.body.removeChild(e), a
    }, a.cellAddPage = function() {
        this.addPage(), f = {
            x: void 0,
            y: void 0,
            w: void 0,
            h: void 0,
            ln: void 0
        }, g += 1
    }, a.cellInitialize = function() {
        f = {
            x: void 0,
            y: void 0,
            w: void 0,
            h: void 0,
            ln: void 0
        }, g = 1
    }, a.cell = function(a, b, c, d, e, g, h) {
        var i = f;
        if (void 0 !== i.ln && (i.ln === g ? (a = i.x + i.w, b = i.y) : (i.y + i.h + d + 13 >= this.internal.pageSize.height && (this.cellAddPage(), this.printHeaders && this.tableHeaderRow && this.printHeaderRow(g)), b = f.y + f.h)), "" !== e[0])
            if (this.printingHeaderRow ? this.rect(a, b, c, d, "FD") : this.rect(a, b, c, d), "right" === h) {
                if (e instanceof Array)
                    for (h = 0; h < e.length; h++) {
                        var i = e[h],
                            j = this.getStringUnitWidth(i) * this.internal.getFontSize();
                        this.text(i, a + c - j - 3, b + this.internal.getLineHeight() * (h + 1))
                    }
            } else this.text(e, a + 3, b + this.internal.getLineHeight());
        return f = {
            x: a,
            y: b,
            w: c,
            h: d,
            ln: g
        }, this
    }, a.getKeys = "function" == typeof Object.keys ? function(a) {
        return a ? Object.keys(a) : []
    } : function(a) {
        var b, c = [];
        for (b in a) a.hasOwnProperty(b) && c.push(b);
        return c
    }, a.arrayMax = function(a, b) {
        var c, d, e, f = a[0];
        for (c = 0, d = a.length; d > c; c += 1) e = a[c], b ? -1 === b(f, e) && (f = e) : e > f && (f = e);
        return f
    }, a.table = function(b, c, d) {
        var e, f, g, h, i, j, k, l = [],
            m = [],
            n = {}, o = {}, p = [],
            q = [];
        if (this.lnMod = 0, d && (this.printHeaders = d.printHeaders || !0), !b) throw "No data for PDF table";
        if (void 0 === c || null === c) l = this.getKeys(b[0]);
        else if (c[0] && "string" != typeof c[0])
            for (f = 0, g = c.length; g > f; f += 1) e = c[f], l.push(e.name), m.push(e.prompt), o[e.name] = e.width;
        else l = c; if (d.autoSize)
            for (k = function(a) {
                return a[e]
            }, f = 0, g = l.length; g > f; f += 1) {
                for (e = l[f], n[e] = b.map(k), p.push(this.getTextDimensions(m[f] || e).w), i = n[e], j = 0, g = i.length; g > j; j += 1) h = i[j], p.push(this.getTextDimensions(h).w);
                o[e] = a.arrayMax(p)
            }
        if (d.printHeaders) {
            for (d = this.calculateLineHeight(l, o, m.length ? m : l), f = 0, g = l.length; g > f; f += 1) e = l[f], q.push([13, 13, o[e], d, String(m.length ? m[f] : e)]);
            this.setTableHeaderRow(q), this.printHeaderRow(1)
        }
        for (f = 0, g = b.length; g > f; f += 1)
            for (m = b[f], d = this.calculateLineHeight(l, o, m), j = 0, q = l.length; q > j; j += 1) e = l[j], this.cell(13, 13, o[e], d, m[e], f + 2, c[j].align);
        return this
    }, a.calculateLineHeight = function(a, b, c) {
        for (var d, e = 0, f = 0; f < a.length; f++) d = a[f], c[d] = this.splitTextToSize(String(c[d]), b[d] - 3), d = this.internal.getLineHeight() * c[d].length + 3, d > e && (e = d);
        return e
    }, a.setTableHeaderRow = function(a) {
        this.tableHeaderRow = a
    }, a.printHeaderRow = function(a) {
        if (!this.tableHeaderRow) throw "Property tableHeaderRow does not exist.";
        var b, c, d;
        for (this.printingHeaderRow = !0, void 0 !== e && (c = e(this, g), f = {
            x: c[0],
            y: c[1],
            w: c[2],
            h: c[3],
            ln: -1
        }), this.setFontStyle("bold"), c = 0, d = this.tableHeaderRow.length; d > c; c += 1) this.setFillColor(200, 200, 200), b = this.tableHeaderRow[c], b = [].concat(b), this.cell.apply(this, b.concat(a));
        this.setFontStyle("normal"), this.printingHeaderRow = !1
    }
}(jsPDF.API),
function(a) {
    a.putTotalPages = function(a) {
        a = RegExp(a, "g");
        for (var b = 1; b <= this.internal.getNumberOfPages(); b++)
            for (var c = 0; c < this.internal.pages[b].length; c++) this.internal.pages[b][c] = this.internal.pages[b][c].replace(a, this.internal.getNumberOfPages());
        return this
    }
}(jsPDF.API);
var BlobBuilder = BlobBuilder || self.WebKitBlobBuilder || self.MozBlobBuilder || self.MSBlobBuilder || function(a) {
        var b = function(a) {
            return Object.prototype.toString.call(a).match(/^\[object\s(.*)\]$/)[1]
        }, c = function() {
                this.data = []
            }, d = function(a, b, c) {
                this.data = a, this.size = a.length, this.type = b, this.encoding = c
            }, e = c.prototype,
            f = d.prototype,
            g = a.FileReaderSync,
            h = function(a) {
                this.code = this[this.name = a]
            }, i = "NOT_FOUND_ERR SECURITY_ERR ABORT_ERR NOT_READABLE_ERR ENCODING_ERR NO_MODIFICATION_ALLOWED_ERR INVALID_STATE_ERR SYNTAX_ERR".split(" "),
            j = i.length,
            k = a.URL || a.webkitURL || a,
            l = k.createObjectURL,
            m = k.revokeObjectURL,
            n = k,
            o = a.btoa,
            p = a.atob,
            q = !1,
            r = function(a) {
                q = !a
            }, s = a.ArrayBuffer,
            t = a.Uint8Array;
        for (c.fake = f.fake = !0; j--;) h.prototype[i[j]] = j + 1;
        try {
            t && r.apply(0, new t(1))
        } catch (u) {}
        return k.createObjectURL || (n = a.URL = {}), n.createObjectURL = function(a) {
            var b = a.type;
            return null === b && (b = "application/octet-stream"), a instanceof d ? (b = "data:" + b, "base64" === a.encoding ? b + ";base64," + a.data : "URI" === a.encoding ? b + "," + decodeURIComponent(a.data) : o ? b + ";base64," + o(a.data) : b + "," + encodeURIComponent(a.data)) : l ? l.call(k, a) : void 0
        }, n.revokeObjectURL = function(a) {
            "data:" !== a.substring(0, 5) && m && m.call(k, a)
        }, e.append = function(a) {
            var c = this.data;
            if (t && a instanceof s)
                if (q) c.push(String.fromCharCode.apply(String, new t(a)));
                else {
                    c = "", a = new t(a);
                    for (var e = 0, f = a.length; f > e; e++) c += String.fromCharCode(a[e])
                } else if ("Blob" === b(a) || "File" === b(a)) {
                if (!g) throw new h("NOT_READABLE_ERR");
                e = new g, c.push(e.readAsBinaryString(a))
            } else a instanceof d ? "base64" === a.encoding && p ? c.push(p(a.data)) : "URI" === a.encoding ? c.push(decodeURIComponent(a.data)) : "raw" === a.encoding && c.push(a.data) : ("string" != typeof a && (a += ""), c.push(unescape(encodeURIComponent(a))))
        }, e.getBlob = function(a) {
            return arguments.length || (a = null), new d(this.data.join(""), a, "raw")
        }, e.toString = function() {
            return "[object BlobBuilder]"
        }, f.slice = function(a, b, c) {
            var e = arguments.length;
            return 3 > e && (c = null), new d(this.data.slice(a, e > 1 ? b : this.data.length), c, this.encoding)
        }, f.toString = function() {
            return "[object Blob]"
        }, c
    }(self),
    saveAs = saveAs || navigator.msSaveBlob && navigator.msSaveBlob.bind(navigator) || function(a) {
        var b = a.document,
            c = a.URL || a.webkitURL || a,
            d = b.createElementNS("http://www.w3.org/1999/xhtml", "a"),
            e = "download" in d,
            f = function(c) {
                var d = b.createEvent("MouseEvents");
                return d.initMouseEvent("click", !0, !1, a, 0, 0, 0, 0, 0, !1, !1, !1, !1, 0, null), c.dispatchEvent(d)
            }, g = a.webkitRequestFileSystem,
            h = a.requestFileSystem || g || a.mozRequestFileSystem,
            i = function(b) {
                (a.setImmediate || a.setTimeout)(function() {
                    throw b
                }, 0)
            }, j = 0,
            k = [],
            l = function(a, b, c) {
                b = [].concat(b);
                for (var d = b.length; d--;) {
                    var e = a["on" + b[d]];
                    if ("function" == typeof e) try {
                        e.call(a, c || a)
                    } catch (f) {
                        i(f)
                    }
                }
            }, m = function(b, c) {
                var i, m, n, o = this,
                    p = b.type,
                    q = !1,
                    r = function() {
                        var c = (a.URL || a.webkitURL || a).createObjectURL(b);
                        return k.push(c), c
                    }, s = function() {
                        l(o, ["writestart", "progress", "write", "writeend"])
                    }, t = function() {
                        (q || !i) && (i = r(b)), m && (m.location.href = i), o.readyState = o.DONE, s()
                    }, u = function(a) {
                        return function() {
                            return o.readyState !== o.DONE ? a.apply(this, arguments) : void 0
                        }
                    }, v = {
                        create: !0,
                        exclusive: !1
                    };
                return o.readyState = o.INIT, c || (c = "download"), e && (i = r(b), d.href = i, d.download = c, f(d)) ? (o.readyState = o.DONE, void s()) : (a.chrome && p && "application/octet-stream" !== p && (n = b.slice || b.webkitSlice, b = n.call(b, 0, b.size, "application/octet-stream"), q = !0), g && "download" !== c && (c += ".download"), m = "application/octet-stream" === p || g ? a : a.open(), void(h ? (j += b.size, h(a.TEMPORARY, j, u(function(a) {
                    a.root.getDirectory("saved", v, u(function(a) {
                        var d = function() {
                            a.getFile(c, v, u(function(a) {
                                a.createWriter(u(function(c) {
                                    c.onwriteend = function(b) {
                                        m.location.href = a.toURL(), k.push(a), o.readyState = o.DONE, l(o, "writeend", b)
                                    }, c.onerror = function() {
                                        var a = c.error;
                                        a.code !== a.ABORT_ERR && t()
                                    }, ["writestart", "progress", "write", "abort"].forEach(function(a) {
                                        c["on" + a] = o["on" + a]
                                    }), c.write(b), o.abort = function() {
                                        c.abort(), o.readyState = o.DONE
                                    }, o.readyState = o.WRITING
                                }), t)
                            }), t)
                        };
                        a.getFile(c, {
                            create: !1
                        }, u(function(a) {
                            a.remove(), d()
                        }), u(function(a) {
                            a.code === a.NOT_FOUND_ERR ? d() : t()
                        }))
                    }), t)
                }), t)) : t()))
            }, n = m.prototype;
        return n.abort = function() {
            this.readyState = this.DONE, l(this, "abort")
        }, n.readyState = n.INIT = 0, n.WRITING = 1, n.DONE = 2, n.error = n.onwritestart = n.onprogress = n.onwrite = n.onabort = n.onerror = n.onwriteend = null, a.addEventListener("unload", function() {
            for (var a = k.length; a--;) {
                var b = k[a];
                "string" == typeof b ? c.revokeObjectURL(b) : b.remove()
            }
            k.length = 0
        }, !1),
        function(a, b) {
            return new m(a, b)
        }
    }(self),
    MAX_BITS = 15,
    D_CODES = 30,
    BL_CODES = 19,
    LENGTH_CODES = 29,
    LITERALS = 256,
    L_CODES = LITERALS + 1 + LENGTH_CODES,
    HEAP_SIZE = 2 * L_CODES + 1,
    END_BLOCK = 256,
    MAX_BL_BITS = 7,
    REP_3_6 = 16,
    REPZ_3_10 = 17,
    REPZ_11_138 = 18,
    Buf_size = 16,
    Z_DEFAULT_COMPRESSION = -1,
    Z_FILTERED = 1,
    Z_HUFFMAN_ONLY = 2,
    Z_DEFAULT_STRATEGY = 0,
    Z_NO_FLUSH = 0,
    Z_PARTIAL_FLUSH = 1,
    Z_FULL_FLUSH = 3,
    Z_FINISH = 4,
    Z_OK = 0,
    Z_STREAM_END = 1,
    Z_NEED_DICT = 2,
    Z_STREAM_ERROR = -2,
    Z_DATA_ERROR = -3,
    Z_BUF_ERROR = -5,
    _dist_code = [0, 1, 2, 3, 4, 4, 5, 5, 6, 6, 6, 6, 7, 7, 7, 7, 8, 8, 8, 8, 8, 8, 8, 8, 9, 9, 9, 9, 9, 9, 9, 9, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 0, 0, 16, 17, 18, 18, 19, 19, 20, 20, 20, 20, 21, 21, 21, 21, 22, 22, 22, 22, 22, 22, 22, 22, 23, 23, 23, 23, 23, 23, 23, 23, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29, 29];
Tree._length_code = [0, 1, 2, 3, 4, 5, 6, 7, 8, 8, 9, 9, 10, 10, 11, 11, 12, 12, 12, 12, 13, 13, 13, 13, 14, 14, 14, 14, 15, 15, 15, 15, 16, 16, 16, 16, 16, 16, 16, 16, 17, 17, 17, 17, 17, 17, 17, 17, 18, 18, 18, 18, 18, 18, 18, 18, 19, 19, 19, 19, 19, 19, 19, 19, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 25, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 26, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 28], Tree.base_length = [0, 1, 2, 3, 4, 5, 6, 7, 8, 10, 12, 14, 16, 20, 24, 28, 32, 40, 48, 56, 64, 80, 96, 112, 128, 160, 192, 224, 0], Tree.base_dist = [0, 1, 2, 3, 4, 6, 8, 12, 16, 24, 32, 48, 64, 96, 128, 192, 256, 384, 512, 768, 1024, 1536, 2048, 3072, 4096, 6144, 8192, 12288, 16384, 24576], Tree.d_code = function(a) {
    return 256 > a ? _dist_code[a] : _dist_code[256 + (a >>> 7)]
}, Tree.extra_lbits = [0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 2, 2, 2, 2, 3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 5, 5, 0],
Tree.extra_dbits = [0, 0, 0, 0, 1, 1, 2, 2, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 8, 8, 9, 9, 10, 10, 11, 11, 12, 12, 13, 13], Tree.extra_blbits = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 3, 7], Tree.bl_order = [16, 17, 18, 0, 8, 7, 9, 6, 10, 5, 11, 4, 12, 3, 13, 2, 14, 1, 15], StaticTree.static_ltree = [12, 8, 140, 8, 76, 8, 204, 8, 44, 8, 172, 8, 108, 8, 236, 8, 28, 8, 156, 8, 92, 8, 220, 8, 60, 8, 188, 8, 124, 8, 252, 8, 2, 8, 130, 8, 66, 8, 194, 8, 34, 8, 162, 8, 98, 8, 226, 8, 18, 8, 146, 8, 82, 8, 210, 8, 50, 8, 178, 8, 114, 8, 242, 8, 10, 8, 138, 8, 74, 8, 202, 8, 42, 8, 170, 8, 106, 8, 234, 8, 26, 8, 154, 8, 90, 8, 218, 8, 58, 8, 186, 8, 122, 8, 250, 8, 6, 8, 134, 8, 70, 8, 198, 8, 38, 8, 166, 8, 102, 8, 230, 8, 22, 8, 150, 8, 86, 8, 214, 8, 54, 8, 182, 8, 118, 8, 246, 8, 14, 8, 142, 8, 78, 8, 206, 8, 46, 8, 174, 8, 110, 8, 238, 8, 30, 8, 158, 8, 94, 8, 222, 8, 62, 8, 190, 8, 126, 8, 254, 8, 1, 8, 129, 8, 65, 8, 193, 8, 33, 8, 161, 8, 97, 8, 225, 8, 17, 8, 145, 8, 81, 8, 209, 8, 49, 8, 177, 8, 113, 8, 241, 8, 9, 8, 137, 8, 73, 8, 201, 8, 41, 8, 169, 8, 105, 8, 233, 8, 25, 8, 153, 8, 89, 8, 217, 8, 57, 8, 185, 8, 121, 8, 249, 8, 5, 8, 133, 8, 69, 8, 197, 8, 37, 8, 165, 8, 101, 8, 229, 8, 21, 8, 149, 8, 85, 8, 213, 8, 53, 8, 181, 8, 117, 8, 245, 8, 13, 8, 141, 8, 77, 8, 205, 8, 45, 8, 173, 8, 109, 8, 237, 8, 29, 8, 157, 8, 93, 8, 221, 8, 61, 8, 189, 8, 125, 8, 253, 8, 19, 9, 275, 9, 147, 9, 403, 9, 83, 9, 339, 9, 211, 9, 467, 9, 51, 9, 307, 9, 179, 9, 435, 9, 115, 9, 371, 9, 243, 9, 499, 9, 11, 9, 267, 9, 139, 9, 395, 9, 75, 9, 331, 9, 203, 9, 459, 9, 43, 9, 299, 9, 171, 9, 427, 9, 107, 9, 363, 9, 235, 9, 491, 9, 27, 9, 283, 9, 155, 9, 411, 9, 91, 9, 347, 9, 219, 9, 475, 9, 59, 9, 315, 9, 187, 9, 443, 9, 123, 9, 379, 9, 251, 9, 507, 9, 7, 9, 263, 9, 135, 9, 391, 9, 71, 9, 327, 9, 199, 9, 455, 9, 39, 9, 295, 9, 167, 9, 423, 9, 103, 9, 359, 9, 231, 9, 487, 9, 23, 9, 279, 9, 151, 9, 407, 9, 87, 9, 343, 9, 215, 9, 471, 9, 55, 9, 311, 9, 183, 9, 439, 9, 119, 9, 375, 9, 247, 9, 503, 9, 15, 9, 271, 9, 143, 9, 399, 9, 79, 9, 335, 9, 207, 9, 463, 9, 47, 9, 303, 9, 175, 9, 431, 9, 111, 9, 367, 9, 239, 9, 495, 9, 31, 9, 287, 9, 159, 9, 415, 9, 95, 9, 351, 9, 223, 9, 479, 9, 63, 9, 319, 9, 191, 9, 447, 9, 127, 9, 383, 9, 255, 9, 511, 9, 0, 7, 64, 7, 32, 7, 96, 7, 16, 7, 80, 7, 48, 7, 112, 7, 8, 7, 72, 7, 40, 7, 104, 7, 24, 7, 88, 7, 56, 7, 120, 7, 4, 7, 68, 7, 36, 7, 100, 7, 20, 7, 84, 7, 52, 7, 116, 7, 3, 8, 131, 8, 67, 8, 195, 8, 35, 8, 163, 8, 99, 8, 227, 8], StaticTree.static_dtree = [0, 5, 16, 5, 8, 5, 24, 5, 4, 5, 20, 5, 12, 5, 28, 5, 2, 5, 18, 5, 10, 5, 26, 5, 6, 5, 22, 5, 14, 5, 30, 5, 1, 5, 17, 5, 9, 5, 25, 5, 5, 5, 21, 5, 13, 5, 29, 5, 3, 5, 19, 5, 11, 5, 27, 5, 7, 5, 23, 5], StaticTree.static_l_desc = new StaticTree(StaticTree.static_ltree, Tree.extra_lbits, LITERALS + 1, L_CODES, MAX_BITS), StaticTree.static_d_desc = new StaticTree(StaticTree.static_dtree, Tree.extra_dbits, 0, D_CODES, MAX_BITS), StaticTree.static_bl_desc = new StaticTree(null, Tree.extra_blbits, 0, BL_CODES, MAX_BL_BITS);
var MAX_MEM_LEVEL = 9,
    DEF_MEM_LEVEL = 8,
    STORED = 0,
    FAST = 1,
    SLOW = 2,
    config_table = [new Config(0, 0, 0, 0, STORED), new Config(4, 4, 8, 4, FAST), new Config(4, 5, 16, 8, FAST), new Config(4, 6, 32, 32, FAST), new Config(4, 4, 16, 16, SLOW), new Config(8, 16, 32, 32, SLOW), new Config(8, 16, 128, 128, SLOW), new Config(8, 32, 128, 256, SLOW), new Config(32, 128, 258, 1024, SLOW), new Config(32, 258, 258, 4096, SLOW)],
    z_errmsg = "need dictionary;stream end;;;stream error;data error;;buffer error;;".split(";"),
    NeedMore = 0,
    BlockDone = 1,
    FinishStarted = 2,
    FinishDone = 3,
    PRESET_DICT = 32,
    INIT_STATE = 42,
    BUSY_STATE = 113,
    FINISH_STATE = 666,
    Z_DEFLATED = 8,
    STORED_BLOCK = 0,
    STATIC_TREES = 1,
    DYN_TREES = 2,
    MIN_MATCH = 3,
    MAX_MATCH = 258,
    MIN_LOOKAHEAD = MAX_MATCH + MIN_MATCH + 1;
ZStream.prototype = {
    deflateInit: function(a, b) {
        return this.dstate = new Deflate, b || (b = MAX_BITS), this.dstate.deflateInit(this, a, b)
    },
    deflate: function(a) {
        return this.dstate ? this.dstate.deflate(this, a) : Z_STREAM_ERROR
    },
    deflateEnd: function() {
        if (!this.dstate) return Z_STREAM_ERROR;
        var a = this.dstate.deflateEnd();
        return this.dstate = null, a
    },
    deflateParams: function(a, b) {
        return this.dstate ? this.dstate.deflateParams(this, a, b) : Z_STREAM_ERROR
    },
    deflateSetDictionary: function(a, b) {
        return this.dstate ? this.dstate.deflateSetDictionary(this, a, b) : Z_STREAM_ERROR
    },
    read_buf: function(a, b, c) {
        var d = this.avail_in;
        return d > c && (d = c), 0 === d ? 0 : (this.avail_in -= d, a.set(this.next_in.subarray(this.next_in_index, this.next_in_index + d), b), this.next_in_index += d, this.total_in += d, d)
    },
    flush_pending: function() {
        var a = this.dstate.pending;
        a > this.avail_out && (a = this.avail_out), 0 !== a && (this.next_out.set(this.dstate.pending_buf.subarray(this.dstate.pending_out, this.dstate.pending_out + a), this.next_out_index), this.next_out_index += a, this.dstate.pending_out += a, this.total_out += a, this.avail_out -= a, this.dstate.pending -= a, 0 === this.dstate.pending && (this.dstate.pending_out = 0))
    }
}, void
function(a, b) {
    "object" == typeof module ? module.exports = b() : "function" == typeof define ? define(b) : a.adler32cs = b()
}(this, function() {
    var a = "function" == typeof ArrayBuffer && "function" == typeof Uint8Array,
        b = null,
        c = function() {
            if (!a) return function() {
                return !1
            };
            try {
                var c = require("buffer");
                "function" == typeof c.Buffer && (b = c.Buffer)
            } catch (d) {}
            return function(a) {
                return a instanceof ArrayBuffer || null !== b && a instanceof b
            }
        }(),
        d = function() {
            return null !== b ? function(a) {
                return new b(a, "utf8").toString("binary")
            } : function(a) {
                return unescape(encodeURIComponent(a))
            }
        }(),
        e = function(a, b) {
            for (var c = 65535 & a, d = a >>> 16, e = 0, f = b.length; f > e; e++) c = (c + (255 & b.charCodeAt(e))) % 65521, d = (d + c) % 65521;
            return (d << 16 | c) >>> 0
        }, f = function(a, b) {
            for (var c = 65535 & a, d = a >>> 16, e = 0, f = b.length; f > e; e++) c = (c + b[e]) % 65521, d = (d + c) % 65521;
            return (d << 16 | c) >>> 0
        }, g = {}, h = g.Adler32 = function() {
            var b = function(a) {
                if (!(this instanceof b)) throw new TypeError("Constructor cannot called be as a function.");
                if (!isFinite(a = null == a ? 1 : +a)) throw Error("First arguments needs to be a finite number.");
                this.checksum = a >>> 0
            }, g = b.prototype = {};
            return g.constructor = b, b.from = function(a) {
                return a.prototype = g, a
            }(function(a) {
                if (!(this instanceof b)) throw new TypeError("Constructor cannot called be as a function.");
                if (null == a) throw Error("First argument needs to be a string.");
                this.checksum = e(1, a.toString())
            }), b.fromUtf8 = function(a) {
                return a.prototype = g, a
            }(function(a) {
                if (!(this instanceof b)) throw new TypeError("Constructor cannot called be as a function.");
                if (null == a) throw Error("First argument needs to be a string.");
                a = d(a.toString()), this.checksum = e(1, a)
            }), a && (b.fromBuffer = function(a) {
                return a.prototype = g, a
            }(function(a) {
                if (!(this instanceof b)) throw new TypeError("Constructor cannot called be as a function.");
                if (!c(a)) throw Error("First argument needs to be ArrayBuffer.");
                return a = new Uint8Array(a), this.checksum = f(1, a)
            })), g.update = function(a) {
                if (null == a) throw Error("First argument needs to be a string.");
                return a = a.toString(), this.checksum = e(this.checksum, a)
            }, g.updateUtf8 = function(a) {
                if (null == a) throw Error("First argument needs to be a string.");
                return a = d(a.toString()), this.checksum = e(this.checksum, a)
            }, a && (g.updateBuffer = function(a) {
                if (!c(a)) throw Error("First argument needs to be ArrayBuffer.");
                return a = new Uint8Array(a), this.checksum = f(this.checksum, a)
            }), g.clone = function() {
                return new h(this.checksum)
            }, b
        }();
    return g.from = function(a) {
        if (null == a) throw Error("First argument needs to be a string.");
        return e(1, a.toString())
    }, g.fromUtf8 = function(a) {
        if (null == a) throw Error("First argument needs to be a string.");
        return a = d(a.toString()), e(1, a)
    }, a && (g.fromBuffer = function(a) {
        if (!c(a)) throw Error("First argument need to be ArrayBuffer.");
        return a = new Uint8Array(a), f(1, a)
    }), g
}),
function() {
    if (window.define) var a = window.define;
    if (window.require) var b = window.require;
    if (window.jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd) var a = jQuery.fn.select2.amd.define,
    b = jQuery.fn.select2.amd.require;
    var c, b, a;
    ! function(d) {
        function e(a, b) {
            return u.call(a, b)
        }

        function f(a, b) {
            var c, d, e, f, g, h, i, j, k, l, m, n = b && b.split("/"),
                o = s.map,
                p = o && o["*"] || {};
            if (a && "." === a.charAt(0))
                if (b) {
                    for (n = n.slice(0, n.length - 1), a = a.split("/"), g = a.length - 1, s.nodeIdCompat && w.test(a[g]) && (a[g] = a[g].replace(w, "")), a = n.concat(a), k = 0; k < a.length; k += 1)
                        if (m = a[k], "." === m) a.splice(k, 1), k -= 1;
                        else if (".." === m) {
                        if (1 === k && (".." === a[2] || ".." === a[0])) break;
                        k > 0 && (a.splice(k - 1, 2), k -= 2)
                    }
                    a = a.join("/")
                } else 0 === a.indexOf("./") && (a = a.substring(2));
            if ((n || p) && o) {
                for (c = a.split("/"), k = c.length; k > 0; k -= 1) {
                    if (d = c.slice(0, k).join("/"), n)
                        for (l = n.length; l > 0; l -= 1)
                            if (e = o[n.slice(0, l).join("/")], e && (e = e[d])) {
                                f = e, h = k;
                                break
                            }
                    if (f) break;
                    !i && p && p[d] && (i = p[d], j = k)
                }!f && i && (f = i, h = j), f && (c.splice(0, h, f), a = c.join("/"))
            }
            return a
        }

        function g(a, b) {
            return function() {
                return n.apply(d, v.call(arguments, 0).concat([a, b]))
            }
        }

        function h(a) {
            return function(b) {
                return f(b, a)
            }
        }

        function i(a) {
            return function(b) {
                q[a] = b
            }
        }

        function j(a) {
            if (e(r, a)) {
                var b = r[a];
                delete r[a], t[a] = !0, m.apply(d, b)
            }
            if (!e(q, a) && !e(t, a)) throw new Error("No " + a);
            return q[a]
        }

        function k(a) {
            var b, c = a ? a.indexOf("!") : -1;
            return c > -1 && (b = a.substring(0, c), a = a.substring(c + 1, a.length)), [b, a]
        }

        function l(a) {
            return function() {
                return s && s.config && s.config[a] || {}
            }
        }
        var m, n, o, p, q = {}, r = {}, s = {}, t = {}, u = Object.prototype.hasOwnProperty,
            v = [].slice,
            w = /\.js$/;
        o = function(a, b) {
            var c, d = k(a),
                e = d[0];
            return a = d[1], e && (e = f(e, b), c = j(e)), e ? a = c && c.normalize ? c.normalize(a, h(b)) : f(a, b) : (a = f(a, b), d = k(a), e = d[0], a = d[1], e && (c = j(e))), {
                f: e ? e + "!" + a : a,
                n: a,
                pr: e,
                p: c
            }
        }, p = {
            require: function(a) {
                return g(a)
            },
            exports: function(a) {
                var b = q[a];
                return "undefined" != typeof b ? b : q[a] = {}
            },
            module: function(a) {
                return {
                    id: a,
                    uri: "",
                    exports: q[a],
                    config: l(a)
                }
            }
        }, m = function(a, b, c, f) {
            var h, k, l, m, n, s, u = [],
                v = typeof c;
            if (f = f || a, "undefined" === v || "function" === v) {
                for (b = !b.length && c.length ? ["require", "exports", "module"] : b, n = 0; n < b.length; n += 1)
                    if (m = o(b[n], f), k = m.f, "require" === k) u[n] = p.require(a);
                    else if ("exports" === k) u[n] = p.exports(a), s = !0;
                else if ("module" === k) h = u[n] = p.module(a);
                else if (e(q, k) || e(r, k) || e(t, k)) u[n] = j(k);
                else {
                    if (!m.p) throw new Error(a + " missing " + k);
                    m.p.load(m.n, g(f, !0), i(k), {}), u[n] = q[k]
                }
                l = c ? c.apply(q[a], u) : void 0, a && (h && h.exports !== d && h.exports !== q[a] ? q[a] = h.exports : l === d && s || (q[a] = l))
            } else a && (q[a] = c)
        }, c = b = n = function(a, b, c, e, f) {
            if ("string" == typeof a) return p[a] ? p[a](b) : j(o(a, b).f);
            if (!a.splice) {
                if (s = a, s.deps && n(s.deps, s.callback), !b) return;
                b.splice ? (a = b, b = c, c = null) : a = d
            }
            return b = b || function() {}, "function" == typeof c && (c = e, e = f), e ? m(d, a, b, c) : setTimeout(function() {
                m(d, a, b, c)
            }, 4), n
        }, n.config = function(a) {
            return n(a)
        }, c._defined = q, a = function(a, b, c) {
            b.splice || (c = b, b = []), e(q, a) || e(r, a) || (r[a] = [a, b, c])
        }, a.amd = {
            jQuery: !0
        }
    }(), a("almond", function() {}), a("jquery", [], function() {
        var a = jQuery || $;
        return null == a && console && console.error && console.error("Select2: An instance of jQuery or a jQuery-compatible library was not found. Make sure that you are including jQuery before Select2 on your web page."), a
    }), a("select2/utils", ["jquery"], function(a) {
        function b(a) {
            var b = a.prototype,
                c = [];
            for (var d in b) {
                var e = b[d];
                "function" == typeof e && "constructor" !== d && c.push(d)
            }
            return c
        }
        var c = {};
        c.Extend = function(a, b) {
            function c() {
                this.constructor = a
            }
            var d = {}.hasOwnProperty;
            for (var e in b) d.call(b, e) && (a[e] = b[e]);
            return c.prototype = b.prototype, a.prototype = new c, a.__super__ = b.prototype, a
        }, c.Decorate = function(a, c) {
            function d() {
                var b = Array.prototype.unshift,
                    d = c.prototype.constructor.length,
                    e = a.prototype.constructor;
                d > 0 && (b.call(arguments, a.prototype.constructor), e = c.prototype.constructor), e.apply(this, arguments)
            }

            function e() {
                this.constructor = d
            }
            var f = b(c),
                g = b(a);
            c.displayName = a.displayName, d.prototype = new e;
            for (var h = 0; h < g.length; h++) {
                var i = g[h];
                d.prototype[i] = a.prototype[i]
            }
            for (var j = (function(a) {
                var b = function() {};
                a in d.prototype && (b = d.prototype[a]);
                var e = c.prototype[a];
                return function() {
                    var a = Array.prototype.unshift;
                    return a.call(arguments, b), e.apply(this, arguments)
                }
            }), k = 0; k < f.length; k++) {
                var l = f[k];
                d.prototype[l] = j(l)
            }
            return d
        };
        var d = function() {
            this.listeners = {}
        };
        return d.prototype.on = function(a, b) {
            this.listeners = this.listeners || {}, a in this.listeners ? this.listeners[a].push(b) : this.listeners[a] = [b]
        }, d.prototype.trigger = function(a) {
            var b = Array.prototype.slice;
            this.listeners = this.listeners || {}, a in this.listeners && this.invoke(this.listeners[a], b.call(arguments, 1)), "*" in this.listeners && this.invoke(this.listeners["*"], arguments)
        }, d.prototype.invoke = function(a, b) {
            for (var c = 0, d = a.length; d > c; c++) a[c].apply(this, b)
        }, c.Observable = d, c.generateChars = function(a) {
            for (var b = "", c = 0; a > c; c++) {
                var d = Math.floor(36 * Math.random());
                b += d.toString(36)
            }
            return b
        }, c.bind = function(a, b) {
            return function() {
                a.apply(b, arguments)
            }
        }, c._convertData = function(a) {
            for (var b in a) {
                var c = b.split("-"),
                    d = a;
                if (1 !== c.length) {
                    for (var e = 0; e < c.length; e++) {
                        var f = c[e];
                        f = f.substring(0, 1).toLowerCase() + f.substring(1), f in d || (d[f] = {}), e == c.length - 1 && (d[f] = a[b]), d = d[f]
                    }
                    delete a[b]
                }
            }
            return a
        }, c.hasScroll = function(b, c) {
            var d = a(c),
                e = c.style.overflowX,
                f = c.style.overflowY;
            return e !== f || "hidden" !== f && "visible" !== f ? "scroll" === e || "scroll" === f ? !0 : d.innerHeight() < c.scrollHeight || d.innerWidth() < c.scrollWidth : !1
        }, c.escapeMarkup = function(a) {
            var b = {
                "\\": "&#92;",
                "&": "&amp;",
                "<": "&lt;",
                ">": "&gt;",
                '"': "&quot;",
                "'": "&#39;",
                "/": "&#47;"
            };
            return "string" != typeof a ? a : String(a).replace(/[&<>"'\/\\]/g, function(a) {
                return b[a]
            })
        }, c
    }), a("select2/results", ["jquery", "./utils"], function(a, b) {
        function c(a, b, d) {
            this.$element = a, this.data = d, this.options = b, c.__super__.constructor.call(this)
        }
        return b.Extend(c, b.Observable), c.prototype.render = function() {
            var b = a('<ul class="select2-results__options" role="tree"></ul>');
            return this.options.get("multiple") && b.attr("aria-multiselectable", "true"), this.$results = b, b
        }, c.prototype.clear = function() {
            this.$results.empty()
        }, c.prototype.displayMessage = function(b) {
            var c = this.options.get("escapeMarkup");
            this.clear(), this.hideLoading();
            var d = a('<li role="treeitem" class="select2-results__option"></li>'),
                e = this.options.get("translations").get(b.message);
            d.append(c(e(b.args))), this.$results.append(d)
        }, c.prototype.append = function(a) {
            this.hideLoading();
            var b = [];
            if (null == a.results || 0 === a.results.length) return void(0 === this.$results.children().length && this.trigger("results:message", {
                message: "noResults"
            }));
            a.results = this.sort(a.results);
            for (var c = 0; c < a.results.length; c++) {
                var d = a.results[c],
                    e = this.option(d);
                b.push(e)
            }
            this.$results.append(b)
        }, c.prototype.position = function(a, b) {
            var c = b.find(".select2-results");
            c.append(a)
        }, c.prototype.sort = function(a) {
            var b = this.options.get("sorter");
            return b(a)
        }, c.prototype.setClasses = function() {
            var b = this;
            this.data.current(function(c) {
                var d = a.map(c, function(a) {
                    return a.id.toString()
                }),
                    e = b.$results.find(".select2-results__option[aria-selected]");
                e.each(function() {
                    var b = a(this),
                        c = a.data(this, "data");
                    a.inArray(c.id, d) > -1 ? b.attr("aria-selected", "true") : b.attr("aria-selected", "false")
                });
                var f = e.filter("[aria-selected=true]");
                f.length > 0 ? f.first().trigger("mouseenter") : e.first().trigger("mouseenter")
            })
        }, c.prototype.showLoading = function(a) {
            this.hideLoading();
            var b = this.options.get("translations").get("searching"),
                c = {
                    disabled: !0,
                    loading: !0,
                    text: b(a)
                }, d = this.option(c);
            d.className += " loading-results", this.$results.prepend(d)
        }, c.prototype.hideLoading = function() {
            this.$results.find(".loading-results").remove()
        }, c.prototype.option = function(b) {
            var c = document.createElement("li");
            c.className = "select2-results__option";
            var d = {
                role: "treeitem",
                "aria-selected": "false"
            };
            b.disabled && (delete d["aria-selected"], d["aria-disabled"] = "true"), null == b.id && delete d["aria-selected"], null != b._resultId && (c.id = b._resultId), b.title && (c.title = b.title), b.children && (d.role = "group", d["aria-label"] = b.text, delete d["aria-selected"]);
            for (var e in d) {
                var f = d[e];
                c.setAttribute(e, f)
            }
            if (b.children) {
                var g = a(c),
                    h = document.createElement("strong");
                h.className = "select2-results__group"; {
                    a(h)
                }
                this.template(b, h);
                for (var i = [], j = 0; j < b.children.length; j++) {
                    var k = b.children[j],
                        l = this.option(k);
                    i.push(l)
                }
                var m = a("<ul></ul>", {
                    "class": "select2-results__options select2-results__options--nested"
                });
                m.append(i), g.append(h), g.append(m)
            } else this.template(b, c);
            return a.data(c, "data", b), c
        }, c.prototype.bind = function(b) {
            var c = this,
                d = b.id + "-results";
            this.$results.attr("id", d), b.on("results:all", function(a) {
                c.clear(), c.append(a.data), b.isOpen() && c.setClasses()
            }), b.on("results:append", function(a) {
                c.append(a.data), b.isOpen() && c.setClasses()
            }), b.on("query", function(a) {
                c.showLoading(a)
            }), b.on("select", function() {
                b.isOpen() && c.setClasses()
            }), b.on("unselect", function() {
                b.isOpen() && c.setClasses()
            }), b.on("open", function() {
                c.$results.attr("aria-expanded", "true"), c.$results.attr("aria-hidden", "false"), c.setClasses(), c.ensureHighlightVisible()
            }), b.on("close", function() {
                c.$results.attr("aria-expanded", "false"), c.$results.attr("aria-hidden", "true"), c.$results.removeAttr("aria-activedescendant")
            }), b.on("results:toggle", function() {
                var a = c.getHighlightedResults();
                0 !== a.length && a.trigger("mouseup")
            }), b.on("results:select", function() {
                var a = c.getHighlightedResults();
                if (0 !== a.length) {
                    var b = a.data("data");
                    "true" == a.attr("aria-selected") ? c.trigger("close") : c.trigger("select", {
                        data: b
                    })
                }
            }), b.on("results:previous", function() {
                var a = c.getHighlightedResults(),
                    b = c.$results.find("[aria-selected]"),
                    d = b.index(a);
                if (0 !== d) {
                    var e = d - 1;
                    0 === a.length && (e = 0);
                    var f = b.eq(e);
                    f.trigger("mouseenter");
                    var g = c.$results.offset().top,
                        h = f.offset().top,
                        i = c.$results.scrollTop() + (h - g);
                    0 === e ? c.$results.scrollTop(0) : 0 > h - g && c.$results.scrollTop(i)
                }
            }), b.on("results:next", function() {
                var a = c.getHighlightedResults(),
                    b = c.$results.find("[aria-selected]"),
                    d = b.index(a),
                    e = d + 1;
                if (!(e >= b.length)) {
                    var f = b.eq(e);
                    f.trigger("mouseenter");
                    var g = c.$results.offset().top + c.$results.outerHeight(!1),
                        h = f.offset().top + f.outerHeight(!1),
                        i = c.$results.scrollTop() + h - g;
                    0 === e ? c.$results.scrollTop(0) : h > g && c.$results.scrollTop(i)
                }
            }), b.on("results:focus", function(a) {
                a.element.addClass("select2-results__option--highlighted")
            }), b.on("results:message", function(a) {
                c.displayMessage(a)
            }), a.fn.mousewheel && this.$results.on("mousewheel", function(a) {
                var b = c.$results.scrollTop(),
                    d = c.$results.get(0).scrollHeight - c.$results.scrollTop() + a.deltaY,
                    e = a.deltaY > 0 && b - a.deltaY <= 0,
                    f = a.deltaY < 0 && d <= c.$results.height();
                e ? (c.$results.scrollTop(0), a.preventDefault(), a.stopPropagation()) : f && (c.$results.scrollTop(c.$results.get(0).scrollHeight - c.$results.height()), a.preventDefault(), a.stopPropagation())
            }), this.$results.on("mouseup", ".select2-results__option[aria-selected]", function(b) {
                var d = a(this),
                    e = d.data("data");
                return "true" === d.attr("aria-selected") ? void(c.options.get("multiple") ? c.trigger("unselect", {
                    originalEvent: b,
                    data: e
                }) : c.trigger("close")) : void c.trigger("select", {
                    originalEvent: b,
                    data: e
                })
            }), this.$results.on("mouseenter", ".select2-results__option[aria-selected]", function() {
                var b = a(this).data("data");
                c.getHighlightedResults().removeClass("select2-results__option--highlighted"), c.trigger("results:focus", {
                    data: b,
                    element: a(this)
                })
            })
        }, c.prototype.getHighlightedResults = function() {
            var a = this.$results.find(".select2-results__option--highlighted");
            return a
        }, c.prototype.destroy = function() {
            this.$results.remove()
        }, c.prototype.ensureHighlightVisible = function() {
            var a = this.getHighlightedResults();
            if (0 !== a.length) {
                var b = this.$results.find("[aria-selected]"),
                    c = b.index(a),
                    d = this.$results.offset().top,
                    e = a.offset().top,
                    f = this.$results.scrollTop() + (e - d),
                    g = e - d;
                f -= 2 * a.outerHeight(!1), 2 >= c ? this.$results.scrollTop(0) : (g > this.$results.outerHeight() || 0 > g) && this.$results.scrollTop(f)
            }
        }, c.prototype.template = function(b, c) {
            var d = this.options.get("templateResult"),
                e = this.options.get("escapeMarkup"),
                f = d(b);
            null == f ? c.style.display = "none" : "string" == typeof f ? c.innerHTML = e(f) : a(c).append(f)
        }, c
    }), a("select2/keys", [], function() {
        var a = {
            BACKSPACE: 8,
            TAB: 9,
            ENTER: 13,
            SHIFT: 16,
            CTRL: 17,
            ALT: 18,
            ESC: 27,
            SPACE: 32,
            PAGE_UP: 33,
            PAGE_DOWN: 34,
            END: 35,
            HOME: 36,
            LEFT: 37,
            UP: 38,
            RIGHT: 39,
            DOWN: 40,
            DELETE: 46
        };
        return a
    }), a("select2/selection/base", ["jquery", "../utils", "../keys"], function(a, b, c) {
        function d(a, b) {
            this.$element = a, this.options = b, d.__super__.constructor.call(this)
        }
        return b.Extend(d, b.Observable), d.prototype.render = function() {
            var b = a('<span class="select2-selection" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"></span>');
            return this._tabindex = 0, null != this.$element.data("old-tabindex") ? this._tabindex = this.$element.data("old-tabindex") : null != this.$element.attr("tabindex") && (this._tabindex = this.$element.attr("tabindex")), b.attr("title", this.$element.attr("title")), b.attr("tabindex", this._tabindex), this.$selection = b, b
        }, d.prototype.bind = function(a) {
            var b = this,
                d = (a.id + "-container", a.id + "-results");
            this.container = a, this.$selection.attr("aria-owns", d), this.$selection.on("focus", function(a) {
                b.trigger("focus", a)
            }), this.$selection.on("blur", function(a) {
                b.trigger("blur", a)
            }), this.$selection.on("keydown", function(a) {
                b.trigger("keypress", a), a.which === c.SPACE && a.preventDefault()
            }), a.on("results:focus", function(a) {
                b.$selection.attr("aria-activedescendant", a.data._resultId)
            }), a.on("selection:update", function(a) {
                b.update(a.data)
            }), a.on("open", function() {
                b.$selection.attr("aria-expanded", "true"), b._attachCloseHandler(a)
            }), a.on("close", function() {
                b.$selection.attr("aria-expanded", "false"), b.$selection.removeAttr("aria-activedescendant"), b.$selection.focus(), b._detachCloseHandler(a)
            }), a.on("enable", function() {
                b.$selection.attr("tabindex", b._tabindex)
            }), a.on("disable", function() {
                b.$selection.attr("tabindex", "-1")
            })
        }, d.prototype._attachCloseHandler = function(b) {
            a(document.body).on("mousedown.select2." + b.id, function(b) {
                var c = a(b.target),
                    d = c.closest(".select2"),
                    e = a(".select2.select2-container--open");
                e.each(function() {
                    var b = a(this);
                    if (this != d[0]) {
                        var c = b.data("element");
                        c.select2("close")
                    }
                })
            })
        }, d.prototype._detachCloseHandler = function(b) {
            a(document.body).off("mousedown.select2." + b.id)
        }, d.prototype.position = function(a, b) {
            var c = b.find(".selection");
            c.append(a)
        }, d.prototype.destroy = function() {
            this._detachCloseHandler(this.container)
        }, d.prototype.update = function() {
            throw new Error("The `update` method must be defined in child classes.")
        }, d
    }), a("select2/selection/single", ["jquery", "./base", "../utils", "../keys"], function(a, b, c) {
        function d() {
            d.__super__.constructor.apply(this, arguments)
        }
        return c.Extend(d, b), d.prototype.render = function() {
            var a = d.__super__.render.call(this);
            return a.addClass("select2-selection--single"), a.html('<span class="select2-selection__rendered"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>'), a
        }, d.prototype.bind = function(a) {
            var b = this;
            d.__super__.bind.apply(this, arguments);
            var c = a.id + "-container";
            this.$selection.find(".select2-selection__rendered").attr("id", c), this.$selection.attr("aria-labelledby", c), this.$selection.on("mousedown", function(a) {
                1 === a.which && b.trigger("toggle", {
                    originalEvent: a
                })
            }), this.$selection.on("focus", function() {}), this.$selection.on("blur", function() {}), a.on("selection:update", function(a) {
                b.update(a.data)
            })
        }, d.prototype.clear = function() {
            this.$selection.find(".select2-selection__rendered").empty()
        }, d.prototype.display = function(a) {
            var b = this.options.get("templateSelection"),
                c = this.options.get("escapeMarkup");
            return c(b(a))
        }, d.prototype.selectionContainer = function() {
            return a("<span></span>")
        }, d.prototype.update = function(a) {
            if (0 === a.length) return void this.clear();
            var b = a[0],
                c = this.display(b),
                d = this.$selection.find(".select2-selection__rendered");
            d.empty().append(c), d.prop("title", b.title || b.text)
        }, d
    }), a("select2/selection/multiple", ["jquery", "./base", "../utils"], function(a, b, c) {
        function d() {
            d.__super__.constructor.apply(this, arguments)
        }
        return c.Extend(d, b), d.prototype.render = function() {
            var a = d.__super__.render.call(this);
            return a.addClass("select2-selection--multiple"), a.html('<ul class="select2-selection__rendered"></ul>'), a
        }, d.prototype.bind = function() {
            var b = this;
            d.__super__.bind.apply(this, arguments), this.$selection.on("click", function(a) {
                b.trigger("toggle", {
                    originalEvent: a
                })
            }), this.$selection.on("click", ".select2-selection__choice__remove", function(c) {
                var d = a(this),
                    e = d.parent(),
                    f = e.data("data");
                b.trigger("unselect", {
                    originalEvent: c,
                    data: f
                })
            })
        }, d.prototype.clear = function() {
            this.$selection.find(".select2-selection__rendered").empty()
        }, d.prototype.display = function(a) {
            var b = this.options.get("templateSelection"),
                c = this.options.get("escapeMarkup");
            return c(b(a))
        }, d.prototype.selectionContainer = function() {
            var b = a('<li class="select2-selection__choice"><span class="select2-selection__choice__remove" role="presentation">&times;</span></li>');
            return b
        }, d.prototype.update = function(a) {
            if (this.clear(), 0 !== a.length) {
                for (var b = [], c = 0; c < a.length; c++) {
                    var d = a[c],
                        e = this.display(d),
                        f = this.selectionContainer();
                    f.append(e), f.prop("title", d.title || d.text), f.data("data", d), b.push(f)
                }
                this.$selection.find(".select2-selection__rendered").append(b)
            }
        }, d
    }), a("select2/selection/placeholder", ["../utils"], function() {
        function a(a, b, c) {
            this.placeholder = this.normalizePlaceholder(c.get("placeholder")), a.call(this, b, c)
        }
        return a.prototype.normalizePlaceholder = function(a, b) {
            return "string" == typeof b && (b = {
                id: "",
                text: b
            }), b
        }, a.prototype.createPlaceholder = function(a, b) {
            var c = this.selectionContainer();
            return c.html(this.display(b)), c.addClass("select2-selection__placeholder").removeClass("select2-selection__choice"), c
        }, a.prototype.update = function(a, b) {
            var c = 1 == b.length && b[0].id != this.placeholder.id,
                d = b.length > 1;
            if (d || c) return a.call(this, b);
            this.clear();
            var e = this.createPlaceholder(this.placeholder);
            this.$selection.find(".select2-selection__rendered").append(e)
        }, a
    }), a("select2/selection/allowClear", ["jquery"], function(a) {
        function b() {}
        return b.prototype.bind = function(b, c, d) {
            var e = this;
            b.call(this, c, d), null == e.placeholder && window.console && console.error && console.error("Select2: The `allowClear` option should be used in combination with the `placeholder` option."), this.$selection.on("mousedown", ".select2-selection__clear", function(b) {
                if (!e.options.get("disabled")) {
                    b.stopPropagation();
                    for (var c = a(this).data("data"), d = 0; d < c.length; d++) {
                        var f = {
                            data: c[d]
                        };
                        if (e.trigger("unselect", f), f.prevented) return
                    }
                    e.$element.val(e.placeholder.id).trigger("change"), e.trigger("toggle")
                }
            })
        }, b.prototype.update = function(b, c) {
            if (b.call(this, c), !(this.$selection.find(".select2-selection__placeholder").length > 0 || 0 === c.length)) {
                var d = a('<span class="select2-selection__clear">&times;</span>');
                d.data("data", c), this.$selection.find(".select2-selection__rendered").append(d)
            }
        }, b
    }), a("select2/selection/search", ["jquery", "../utils", "../keys"], function(a, b, c) {
        function d(a, b, c) {
            a.call(this, b, c)
        }
        return d.prototype.render = function(b) {
            var c = a('<li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" /></li>');
            this.$searchContainer = c, this.$search = c.find("input");
            var d = b.call(this);
            return d
        }, d.prototype.bind = function(a, b, d) {
            var e = this;
            a.call(this, b, d), b.on("open", function() {
                e.$search.attr("tabindex", 0), e.$search.focus()
            }), b.on("close", function() {
                e.$search.attr("tabindex", -1), e.$search.val(""), e.$search.focus()
            }), b.on("enable", function() {
                e.$search.prop("disabled", !1)
            }), b.on("disable", function() {
                e.$search.prop("disabled", !0)
            }), this.$selection.on("focusin", ".select2-search--inline", function(a) {
                e.trigger("focus", a)
            }), this.$selection.on("focusout", ".select2-search--inline", function(a) {
                e.trigger("blur", a)
            }), this.$selection.on("keydown", ".select2-search--inline", function(a) {
                a.stopPropagation(), e.trigger("keypress", a), e._keyUpPrevented = a.isDefaultPrevented();
                var b = a.which;
                if (b === c.BACKSPACE && "" === e.$search.val()) {
                    var d = e.$searchContainer.prev(".select2-selection__choice");
                    if (d.length > 0) {
                        var f = d.data("data");
                        e.searchRemoveChoice(f)
                    }
                }
            }), this.$selection.on("input", ".select2-search--inline", function() {
                e.$selection.off("keyup.search")
            }), this.$selection.on("keyup.search input", ".select2-search--inline", function(a) {
                e.handleSearch(a)
            })
        }, d.prototype.createPlaceholder = function(a, b) {
            this.$search.attr("placeholder", b.text)
        }, d.prototype.update = function(a, b) {
            this.$search.attr("placeholder", ""), a.call(this, b), this.$selection.find(".select2-selection__rendered").append(this.$searchContainer), this.resizeSearch()
        }, d.prototype.handleSearch = function() {
            if (this.resizeSearch(), !this._keyUpPrevented) {
                var a = this.$search.val();
                this.trigger("query", {
                    term: a
                })
            }
            this._keyUpPrevented = !1
        }, d.prototype.searchRemoveChoice = function(a, b) {
            this.trigger("unselect", {
                data: b
            }), this.trigger("open"), this.$search.val(b.text + " ")
        }, d.prototype.resizeSearch = function() {
            this.$search.css("width", "25px");
            var a = "";
            if ("" !== this.$search.attr("placeholder")) a = this.$selection.find(".select2-selection__rendered").innerWidth();
            else {
                var b = this.$search.val().length + 1;
                a = .75 * b + "em"
            }
            this.$search.css("width", a)
        }, d
    }), a("select2/selection/eventRelay", ["jquery"], function(a) {
        function b() {}
        return b.prototype.bind = function(b, c, d) {
            var e = this,
                f = ["open", "opening", "close", "closing", "select", "selecting", "unselect", "unselecting"],
                g = ["opening", "closing", "selecting", "unselecting"];
            b.call(this, c, d), c.on("*", function(b, c) {
                if (-1 !== a.inArray(b, f)) {
                    c = c || {};
                    var d = a.Event("select2:" + b, {
                        params: c
                    });
                    e.$element.trigger(d), -1 !== a.inArray(b, g) && (c.prevented = d.isDefaultPrevented())
                }
            })
        }, b
    }), a("select2/translation", ["jquery"], function(a) {
        function c(a) {
            this.dict = a || {}
        }
        return c.prototype.all = function() {
            return this.dict
        }, c.prototype.get = function(a) {
            return this.dict[a]
        }, c.prototype.extend = function(b) {
            this.dict = a.extend({}, b.all(), this.dict)
        }, c._cache = {}, c.loadPath = function(a) {
            if (!(a in c._cache)) {
                var d = b(a);
                c._cache[a] = d
            }
            return new c(c._cache[a])
        }, c
    }), a("select2/diacritics", [], function() {
        var a = {
            "Ⓐ": "A",
            "Ａ": "A",
            "À": "A",
            "Á": "A",
            "Â": "A",
            "Ầ": "A",
            "Ấ": "A",
            "Ẫ": "A",
            "Ẩ": "A",
            "Ã": "A",
            "Ā": "A",
            "Ă": "A",
            "Ằ": "A",
            "Ắ": "A",
            "Ẵ": "A",
            "Ẳ": "A",
            "Ȧ": "A",
            "Ǡ": "A",
            "Ä": "A",
            "Ǟ": "A",
            "Ả": "A",
            "Å": "A",
            "Ǻ": "A",
            "Ǎ": "A",
            "Ȁ": "A",
            "Ȃ": "A",
            "Ạ": "A",
            "Ậ": "A",
            "Ặ": "A",
            "Ḁ": "A",
            "Ą": "A",
            "Ⱥ": "A",
            "Ɐ": "A",
            "Ꜳ": "AA",
            "Æ": "AE",
            "Ǽ": "AE",
            "Ǣ": "AE",
            "Ꜵ": "AO",
            "Ꜷ": "AU",
            "Ꜹ": "AV",
            "Ꜻ": "AV",
            "Ꜽ": "AY",
            "Ⓑ": "B",
            "Ｂ": "B",
            "Ḃ": "B",
            "Ḅ": "B",
            "Ḇ": "B",
            "Ƀ": "B",
            "Ƃ": "B",
            "Ɓ": "B",
            "Ⓒ": "C",
            "Ｃ": "C",
            "Ć": "C",
            "Ĉ": "C",
            "Ċ": "C",
            "Č": "C",
            "Ç": "C",
            "Ḉ": "C",
            "Ƈ": "C",
            "Ȼ": "C",
            "Ꜿ": "C",
            "Ⓓ": "D",
            "Ｄ": "D",
            "Ḋ": "D",
            "Ď": "D",
            "Ḍ": "D",
            "Ḑ": "D",
            "Ḓ": "D",
            "Ḏ": "D",
            "Đ": "D",
            "Ƌ": "D",
            "Ɗ": "D",
            "Ɖ": "D",
            "Ꝺ": "D",
            "Ǳ": "DZ",
            "Ǆ": "DZ",
            "ǲ": "Dz",
            "ǅ": "Dz",
            "Ⓔ": "E",
            "Ｅ": "E",
            "È": "E",
            "É": "E",
            "Ê": "E",
            "Ề": "E",
            "Ế": "E",
            "Ễ": "E",
            "Ể": "E",
            "Ẽ": "E",
            "Ē": "E",
            "Ḕ": "E",
            "Ḗ": "E",
            "Ĕ": "E",
            "Ė": "E",
            "Ë": "E",
            "Ẻ": "E",
            "Ě": "E",
            "Ȅ": "E",
            "Ȇ": "E",
            "Ẹ": "E",
            "Ệ": "E",
            "Ȩ": "E",
            "Ḝ": "E",
            "Ę": "E",
            "Ḙ": "E",
            "Ḛ": "E",
            "Ɛ": "E",
            "Ǝ": "E",
            "Ⓕ": "F",
            "Ｆ": "F",
            "Ḟ": "F",
            "Ƒ": "F",
            "Ꝼ": "F",
            "Ⓖ": "G",
            "Ｇ": "G",
            "Ǵ": "G",
            "Ĝ": "G",
            "Ḡ": "G",
            "Ğ": "G",
            "Ġ": "G",
            "Ǧ": "G",
            "Ģ": "G",
            "Ǥ": "G",
            "Ɠ": "G",
            "Ꞡ": "G",
            "Ᵹ": "G",
            "Ꝿ": "G",
            "Ⓗ": "H",
            "Ｈ": "H",
            "Ĥ": "H",
            "Ḣ": "H",
            "Ḧ": "H",
            "Ȟ": "H",
            "Ḥ": "H",
            "Ḩ": "H",
            "Ḫ": "H",
            "Ħ": "H",
            "Ⱨ": "H",
            "Ⱶ": "H",
            "Ɥ": "H",
            "Ⓘ": "I",
            "Ｉ": "I",
            "Ì": "I",
            "Í": "I",
            "Î": "I",
            "Ĩ": "I",
            "Ī": "I",
            "Ĭ": "I",
            "İ": "I",
            "Ï": "I",
            "Ḯ": "I",
            "Ỉ": "I",
            "Ǐ": "I",
            "Ȉ": "I",
            "Ȋ": "I",
            "Ị": "I",
            "Į": "I",
            "Ḭ": "I",
            "Ɨ": "I",
            "Ⓙ": "J",
            "Ｊ": "J",
            "Ĵ": "J",
            "Ɉ": "J",
            "Ⓚ": "K",
            "Ｋ": "K",
            "Ḱ": "K",
            "Ǩ": "K",
            "Ḳ": "K",
            "Ķ": "K",
            "Ḵ": "K",
            "Ƙ": "K",
            "Ⱪ": "K",
            "Ꝁ": "K",
            "Ꝃ": "K",
            "Ꝅ": "K",
            "Ꞣ": "K",
            "Ⓛ": "L",
            "Ｌ": "L",
            "Ŀ": "L",
            "Ĺ": "L",
            "Ľ": "L",
            "Ḷ": "L",
            "Ḹ": "L",
            "Ļ": "L",
            "Ḽ": "L",
            "Ḻ": "L",
            "Ł": "L",
            "Ƚ": "L",
            "Ɫ": "L",
            "Ⱡ": "L",
            "Ꝉ": "L",
            "Ꝇ": "L",
            "Ꞁ": "L",
            "Ǉ": "LJ",
            "ǈ": "Lj",
            "Ⓜ": "M",
            "Ｍ": "M",
            "Ḿ": "M",
            "Ṁ": "M",
            "Ṃ": "M",
            "Ɱ": "M",
            "Ɯ": "M",
            "Ⓝ": "N",
            "Ｎ": "N",
            "Ǹ": "N",
            "Ń": "N",
            "Ñ": "N",
            "Ṅ": "N",
            "Ň": "N",
            "Ṇ": "N",
            "Ņ": "N",
            "Ṋ": "N",
            "Ṉ": "N",
            "Ƞ": "N",
            "Ɲ": "N",
            "Ꞑ": "N",
            "Ꞥ": "N",
            "Ǌ": "NJ",
            "ǋ": "Nj",
            "Ⓞ": "O",
            "Ｏ": "O",
            "Ò": "O",
            "Ó": "O",
            "Ô": "O",
            "Ồ": "O",
            "Ố": "O",
            "Ỗ": "O",
            "Ổ": "O",
            "Õ": "O",
            "Ṍ": "O",
            "Ȭ": "O",
            "Ṏ": "O",
            "Ō": "O",
            "Ṑ": "O",
            "Ṓ": "O",
            "Ŏ": "O",
            "Ȯ": "O",
            "Ȱ": "O",
            "Ö": "O",
            "Ȫ": "O",
            "Ỏ": "O",
            "Ő": "O",
            "Ǒ": "O",
            "Ȍ": "O",
            "Ȏ": "O",
            "Ơ": "O",
            "Ờ": "O",
            "Ớ": "O",
            "Ỡ": "O",
            "Ở": "O",
            "Ợ": "O",
            "Ọ": "O",
            "Ộ": "O",
            "Ǫ": "O",
            "Ǭ": "O",
            "Ø": "O",
            "Ǿ": "O",
            "Ɔ": "O",
            "Ɵ": "O",
            "Ꝋ": "O",
            "Ꝍ": "O",
            "Ƣ": "OI",
            "Ꝏ": "OO",
            "Ȣ": "OU",
            "Ⓟ": "P",
            "Ｐ": "P",
            "Ṕ": "P",
            "Ṗ": "P",
            "Ƥ": "P",
            "Ᵽ": "P",
            "Ꝑ": "P",
            "Ꝓ": "P",
            "Ꝕ": "P",
            "Ⓠ": "Q",
            "Ｑ": "Q",
            "Ꝗ": "Q",
            "Ꝙ": "Q",
            "Ɋ": "Q",
            "Ⓡ": "R",
            "Ｒ": "R",
            "Ŕ": "R",
            "Ṙ": "R",
            "Ř": "R",
            "Ȑ": "R",
            "Ȓ": "R",
            "Ṛ": "R",
            "Ṝ": "R",
            "Ŗ": "R",
            "Ṟ": "R",
            "Ɍ": "R",
            "Ɽ": "R",
            "Ꝛ": "R",
            "Ꞧ": "R",
            "Ꞃ": "R",
            "Ⓢ": "S",
            "Ｓ": "S",
            "ẞ": "S",
            "Ś": "S",
            "Ṥ": "S",
            "Ŝ": "S",
            "Ṡ": "S",
            "Š": "S",
            "Ṧ": "S",
            "Ṣ": "S",
            "Ṩ": "S",
            "Ș": "S",
            "Ş": "S",
            "Ȿ": "S",
            "Ꞩ": "S",
            "Ꞅ": "S",
            "Ⓣ": "T",
            "Ｔ": "T",
            "Ṫ": "T",
            "Ť": "T",
            "Ṭ": "T",
            "Ț": "T",
            "Ţ": "T",
            "Ṱ": "T",
            "Ṯ": "T",
            "Ŧ": "T",
            "Ƭ": "T",
            "Ʈ": "T",
            "Ⱦ": "T",
            "Ꞇ": "T",
            "Ꜩ": "TZ",
            "Ⓤ": "U",
            "Ｕ": "U",
            "Ù": "U",
            "Ú": "U",
            "Û": "U",
            "Ũ": "U",
            "Ṹ": "U",
            "Ū": "U",
            "Ṻ": "U",
            "Ŭ": "U",
            "Ü": "U",
            "Ǜ": "U",
            "Ǘ": "U",
            "Ǖ": "U",
            "Ǚ": "U",
            "Ủ": "U",
            "Ů": "U",
            "Ű": "U",
            "Ǔ": "U",
            "Ȕ": "U",
            "Ȗ": "U",
            "Ư": "U",
            "Ừ": "U",
            "Ứ": "U",
            "Ữ": "U",
            "Ử": "U",
            "Ự": "U",
            "Ụ": "U",
            "Ṳ": "U",
            "Ų": "U",
            "Ṷ": "U",
            "Ṵ": "U",
            "Ʉ": "U",
            "Ⓥ": "V",
            "Ｖ": "V",
            "Ṽ": "V",
            "Ṿ": "V",
            "Ʋ": "V",
            "Ꝟ": "V",
            "Ʌ": "V",
            "Ꝡ": "VY",
            "Ⓦ": "W",
            "Ｗ": "W",
            "Ẁ": "W",
            "Ẃ": "W",
            "Ŵ": "W",
            "Ẇ": "W",
            "Ẅ": "W",
            "Ẉ": "W",
            "Ⱳ": "W",
            "Ⓧ": "X",
            "Ｘ": "X",
            "Ẋ": "X",
            "Ẍ": "X",
            "Ⓨ": "Y",
            "Ｙ": "Y",
            "Ỳ": "Y",
            "Ý": "Y",
            "Ŷ": "Y",
            "Ỹ": "Y",
            "Ȳ": "Y",
            "Ẏ": "Y",
            "Ÿ": "Y",
            "Ỷ": "Y",
            "Ỵ": "Y",
            "Ƴ": "Y",
            "Ɏ": "Y",
            "Ỿ": "Y",
            "Ⓩ": "Z",
            "Ｚ": "Z",
            "Ź": "Z",
            "Ẑ": "Z",
            "Ż": "Z",
            "Ž": "Z",
            "Ẓ": "Z",
            "Ẕ": "Z",
            "Ƶ": "Z",
            "Ȥ": "Z",
            "Ɀ": "Z",
            "Ⱬ": "Z",
            "Ꝣ": "Z",
            "ⓐ": "a",
            "ａ": "a",
            "ẚ": "a",
            "à": "a",
            "á": "a",
            "â": "a",
            "ầ": "a",
            "ấ": "a",
            "ẫ": "a",
            "ẩ": "a",
            "ã": "a",
            "ā": "a",
            "ă": "a",
            "ằ": "a",
            "ắ": "a",
            "ẵ": "a",
            "ẳ": "a",
            "ȧ": "a",
            "ǡ": "a",
            "ä": "a",
            "ǟ": "a",
            "ả": "a",
            "å": "a",
            "ǻ": "a",
            "ǎ": "a",
            "ȁ": "a",
            "ȃ": "a",
            "ạ": "a",
            "ậ": "a",
            "ặ": "a",
            "ḁ": "a",
            "ą": "a",
            "ⱥ": "a",
            "ɐ": "a",
            "ꜳ": "aa",
            "æ": "ae",
            "ǽ": "ae",
            "ǣ": "ae",
            "ꜵ": "ao",
            "ꜷ": "au",
            "ꜹ": "av",
            "ꜻ": "av",
            "ꜽ": "ay",
            "ⓑ": "b",
            "ｂ": "b",
            "ḃ": "b",
            "ḅ": "b",
            "ḇ": "b",
            "ƀ": "b",
            "ƃ": "b",
            "ɓ": "b",
            "ⓒ": "c",
            "ｃ": "c",
            "ć": "c",
            "ĉ": "c",
            "ċ": "c",
            "č": "c",
            "ç": "c",
            "ḉ": "c",
            "ƈ": "c",
            "ȼ": "c",
            "ꜿ": "c",
            "ↄ": "c",
            "ⓓ": "d",
            "ｄ": "d",
            "ḋ": "d",
            "ď": "d",
            "ḍ": "d",
            "ḑ": "d",
            "ḓ": "d",
            "ḏ": "d",
            "đ": "d",
            "ƌ": "d",
            "ɖ": "d",
            "ɗ": "d",
            "ꝺ": "d",
            "ǳ": "dz",
            "ǆ": "dz",
            "ⓔ": "e",
            "ｅ": "e",
            "è": "e",
            "é": "e",
            "ê": "e",
            "ề": "e",
            "ế": "e",
            "ễ": "e",
            "ể": "e",
            "ẽ": "e",
            "ē": "e",
            "ḕ": "e",
            "ḗ": "e",
            "ĕ": "e",
            "ė": "e",
            "ë": "e",
            "ẻ": "e",
            "ě": "e",
            "ȅ": "e",
            "ȇ": "e",
            "ẹ": "e",
            "ệ": "e",
            "ȩ": "e",
            "ḝ": "e",
            "ę": "e",
            "ḙ": "e",
            "ḛ": "e",
            "ɇ": "e",
            "ɛ": "e",
            "ǝ": "e",
            "ⓕ": "f",
            "ｆ": "f",
            "ḟ": "f",
            "ƒ": "f",
            "ꝼ": "f",
            "ⓖ": "g",
            "ｇ": "g",
            "ǵ": "g",
            "ĝ": "g",
            "ḡ": "g",
            "ğ": "g",
            "ġ": "g",
            "ǧ": "g",
            "ģ": "g",
            "ǥ": "g",
            "ɠ": "g",
            "ꞡ": "g",
            "ᵹ": "g",
            "ꝿ": "g",
            "ⓗ": "h",
            "ｈ": "h",
            "ĥ": "h",
            "ḣ": "h",
            "ḧ": "h",
            "ȟ": "h",
            "ḥ": "h",
            "ḩ": "h",
            "ḫ": "h",
            "ẖ": "h",
            "ħ": "h",
            "ⱨ": "h",
            "ⱶ": "h",
            "ɥ": "h",
            "ƕ": "hv",
            "ⓘ": "i",
            "ｉ": "i",
            "ì": "i",
            "í": "i",
            "î": "i",
            "ĩ": "i",
            "ī": "i",
            "ĭ": "i",
            "ï": "i",
            "ḯ": "i",
            "ỉ": "i",
            "ǐ": "i",
            "ȉ": "i",
            "ȋ": "i",
            "ị": "i",
            "į": "i",
            "ḭ": "i",
            "ɨ": "i",
            "ı": "i",
            "ⓙ": "j",
            "ｊ": "j",
            "ĵ": "j",
            "ǰ": "j",
            "ɉ": "j",
            "ⓚ": "k",
            "ｋ": "k",
            "ḱ": "k",
            "ǩ": "k",
            "ḳ": "k",
            "ķ": "k",
            "ḵ": "k",
            "ƙ": "k",
            "ⱪ": "k",
            "ꝁ": "k",
            "ꝃ": "k",
            "ꝅ": "k",
            "ꞣ": "k",
            "ⓛ": "l",
            "ｌ": "l",
            "ŀ": "l",
            "ĺ": "l",
            "ľ": "l",
            "ḷ": "l",
            "ḹ": "l",
            "ļ": "l",
            "ḽ": "l",
            "ḻ": "l",
            "ſ": "l",
            "ł": "l",
            "ƚ": "l",
            "ɫ": "l",
            "ⱡ": "l",
            "ꝉ": "l",
            "ꞁ": "l",
            "ꝇ": "l",
            "ǉ": "lj",
            "ⓜ": "m",
            "ｍ": "m",
            "ḿ": "m",
            "ṁ": "m",
            "ṃ": "m",
            "ɱ": "m",
            "ɯ": "m",
            "ⓝ": "n",
            "ｎ": "n",
            "ǹ": "n",
            "ń": "n",
            "ñ": "n",
            "ṅ": "n",
            "ň": "n",
            "ṇ": "n",
            "ņ": "n",
            "ṋ": "n",
            "ṉ": "n",
            "ƞ": "n",
            "ɲ": "n",
            "ŉ": "n",
            "ꞑ": "n",
            "ꞥ": "n",
            "ǌ": "nj",
            "ⓞ": "o",
            "ｏ": "o",
            "ò": "o",
            "ó": "o",
            "ô": "o",
            "ồ": "o",
            "ố": "o",
            "ỗ": "o",
            "ổ": "o",
            "õ": "o",
            "ṍ": "o",
            "ȭ": "o",
            "ṏ": "o",
            "ō": "o",
            "ṑ": "o",
            "ṓ": "o",
            "ŏ": "o",
            "ȯ": "o",
            "ȱ": "o",
            "ö": "o",
            "ȫ": "o",
            "ỏ": "o",
            "ő": "o",
            "ǒ": "o",
            "ȍ": "o",
            "ȏ": "o",
            "ơ": "o",
            "ờ": "o",
            "ớ": "o",
            "ỡ": "o",
            "ở": "o",
            "ợ": "o",
            "ọ": "o",
            "ộ": "o",
            "ǫ": "o",
            "ǭ": "o",
            "ø": "o",
            "ǿ": "o",
            "ɔ": "o",
            "ꝋ": "o",
            "ꝍ": "o",
            "ɵ": "o",
            "ƣ": "oi",
            "ȣ": "ou",
            "ꝏ": "oo",
            "ⓟ": "p",
            "ｐ": "p",
            "ṕ": "p",
            "ṗ": "p",
            "ƥ": "p",
            "ᵽ": "p",
            "ꝑ": "p",
            "ꝓ": "p",
            "ꝕ": "p",
            "ⓠ": "q",
            "ｑ": "q",
            "ɋ": "q",
            "ꝗ": "q",
            "ꝙ": "q",
            "ⓡ": "r",
            "ｒ": "r",
            "ŕ": "r",
            "ṙ": "r",
            "ř": "r",
            "ȑ": "r",
            "ȓ": "r",
            "ṛ": "r",
            "ṝ": "r",
            "ŗ": "r",
            "ṟ": "r",
            "ɍ": "r",
            "ɽ": "r",
            "ꝛ": "r",
            "ꞧ": "r",
            "ꞃ": "r",
            "ⓢ": "s",
            "ｓ": "s",
            "ß": "s",
            "ś": "s",
            "ṥ": "s",
            "ŝ": "s",
            "ṡ": "s",
            "š": "s",
            "ṧ": "s",
            "ṣ": "s",
            "ṩ": "s",
            "ș": "s",
            "ş": "s",
            "ȿ": "s",
            "ꞩ": "s",
            "ꞅ": "s",
            "ẛ": "s",
            "ⓣ": "t",
            "ｔ": "t",
            "ṫ": "t",
            "ẗ": "t",
            "ť": "t",
            "ṭ": "t",
            "ț": "t",
            "ţ": "t",
            "ṱ": "t",
            "ṯ": "t",
            "ŧ": "t",
            "ƭ": "t",
            "ʈ": "t",
            "ⱦ": "t",
            "ꞇ": "t",
            "ꜩ": "tz",
            "ⓤ": "u",
            "ｕ": "u",
            "ù": "u",
            "ú": "u",
            "û": "u",
            "ũ": "u",
            "ṹ": "u",
            "ū": "u",
            "ṻ": "u",
            "ŭ": "u",
            "ü": "u",
            "ǜ": "u",
            "ǘ": "u",
            "ǖ": "u",
            "ǚ": "u",
            "ủ": "u",
            "ů": "u",
            "ű": "u",
            "ǔ": "u",
            "ȕ": "u",
            "ȗ": "u",
            "ư": "u",
            "ừ": "u",
            "ứ": "u",
            "ữ": "u",
            "ử": "u",
            "ự": "u",
            "ụ": "u",
            "ṳ": "u",
            "ų": "u",
            "ṷ": "u",
            "ṵ": "u",
            "ʉ": "u",
            "ⓥ": "v",
            "ｖ": "v",
            "ṽ": "v",
            "ṿ": "v",
            "ʋ": "v",
            "ꝟ": "v",
            "ʌ": "v",
            "ꝡ": "vy",
            "ⓦ": "w",
            "ｗ": "w",
            "ẁ": "w",
            "ẃ": "w",
            "ŵ": "w",
            "ẇ": "w",
            "ẅ": "w",
            "ẘ": "w",
            "ẉ": "w",
            "ⱳ": "w",
            "ⓧ": "x",
            "ｘ": "x",
            "ẋ": "x",
            "ẍ": "x",
            "ⓨ": "y",
            "ｙ": "y",
            "ỳ": "y",
            "ý": "y",
            "ŷ": "y",
            "ỹ": "y",
            "ȳ": "y",
            "ẏ": "y",
            "ÿ": "y",
            "ỷ": "y",
            "ẙ": "y",
            "ỵ": "y",
            "ƴ": "y",
            "ɏ": "y",
            "ỿ": "y",
            "ⓩ": "z",
            "ｚ": "z",
            "ź": "z",
            "ẑ": "z",
            "ż": "z",
            "ž": "z",
            "ẓ": "z",
            "ẕ": "z",
            "ƶ": "z",
            "ȥ": "z",
            "ɀ": "z",
            "ⱬ": "z",
            "ꝣ": "z",
            "Ά": "Α",
            "Έ": "Ε",
            "Ή": "Η",
            "Ί": "Ι",
            "Ϊ": "Ι",
            "Ό": "Ο",
            "Ύ": "Υ",
            "Ϋ": "Υ",
            "Ώ": "Ω",
            "ά": "α",
            "έ": "ε",
            "ή": "η",
            "ί": "ι",
            "ϊ": "ι",
            "ΐ": "ι",
            "ό": "ο",
            "ύ": "υ",
            "ϋ": "υ",
            "ΰ": "υ",
            "ω": "ω",
            "ς": "σ"
        };
        return a
    }), a("select2/data/base", ["../utils"], function(a) {
        function b() {
            b.__super__.constructor.call(this)
        }
        return a.Extend(b, a.Observable), b.prototype.current = function() {
            throw new Error("The `current` method must be defined in child classes.")
        }, b.prototype.query = function() {
            throw new Error("The `query` method must be defined in child classes.")
        }, b.prototype.bind = function() {}, b.prototype.destroy = function() {}, b.prototype.generateResultId = function(b, c) {
            var d = b.id + "-result-";
            return d += a.generateChars(4), d += null != c.id ? "-" + c.id.toString() : "-" + a.generateChars(4)
        }, b
    }), a("select2/data/select", ["./base", "../utils", "jquery"], function(a, b, c) {
        function d(a, b) {
            this.$element = a, this.options = b, d.__super__.constructor.call(this)
        }
        return b.Extend(d, a), d.prototype.current = function(a) {
            var b = [],
                d = this;
            this.$element.find(":selected").each(function() {
                var a = c(this),
                    e = d.item(a);
                b.push(e)
            }), a(b)
        }, d.prototype.select = function(a) {
            var b = this;
            if (c(a.element).is("option")) return a.element.selected = !0, void this.$element.trigger("change");
            if (this.$element.prop("multiple")) this.current(function(d) {
                var e = [];
                a = [a], a.push.apply(a, d);
                for (var f = 0; f < a.length; f++) {
                    var g = a[f].id; - 1 === c.inArray(g, e) && e.push(g)
                }
                b.$element.val(e), b.$element.trigger("change")
            });
            else {
                var d = a.id;
                this.$element.val(d), this.$element.trigger("change")
            }
        }, d.prototype.unselect = function(a) {
            var b = this;
            if (this.$element.prop("multiple")) return c(a.element).is("option") ? (a.element.selected = !1, void this.$element.trigger("change")) : void this.current(function(d) {
                for (var e = [], f = 0; f < d.length; f++) {
                    var g = d[f].id;
                    g !== a.id && -1 === c.inArray(g, e) && e.push(g)
                }
                b.$element.val(e), b.$element.trigger("change")
            })
        }, d.prototype.bind = function(a) {
            var b = this;
            this.container = a, a.on("select", function(a) {
                b.select(a.data)
            }), a.on("unselect", function(a) {
                b.unselect(a.data)
            })
        }, d.prototype.destroy = function() {
            this.$element.find("*").each(function() {
                c.removeData(this, "data")
            })
        }, d.prototype.query = function(a, b) {
            var d = [],
                e = this,
                f = this.$element.children();
            f.each(function() {
                var b = c(this);
                if (b.is("option") || b.is("optgroup")) {
                    var f = e.item(b),
                        g = e.matches(a, f);
                    null !== g && d.push(g)
                }
            }), b({
                results: d
            })
        }, d.prototype.addOptions = function(a) {
            this.$element.append(a)
        }, d.prototype.option = function(a) {
            var b;
            a.children ? (b = document.createElement("optgroup"), b.label = a.text) : (b = document.createElement("option"), void 0 !== b.textContent ? b.textContent = a.text : b.innerText = a.text), a.id && (b.value = a.id), a.disabled && (b.disabled = !0), a.selected && (b.selected = !0), a.title && (b.title = a.title);
            var d = c(b),
                e = this._normalizeItem(a);
            return e.element = b, c.data(b, "data", e), d
        }, d.prototype.item = function(a) {
            var b = {};
            if (b = c.data(a[0], "data"), null != b) return b;
            if (a.is("option")) b = {
                id: a.val(),
                text: a.html(),
                disabled: a.prop("disabled"),
                selected: a.prop("selected"),
                title: a.prop("title")
            };
            else if (a.is("optgroup")) {
                b = {
                    text: a.prop("label"),
                    children: [],
                    title: a.prop("title")
                };
                for (var d = a.children("option"), e = [], f = 0; f < d.length; f++) {
                    var g = c(d[f]),
                        h = this.item(g);
                    e.push(h)
                }
                b.children = e
            }
            return b = this._normalizeItem(b), b.element = a[0], c.data(a[0], "data", b), b
        }, d.prototype._normalizeItem = function(a) {
            c.isPlainObject(a) || (a = {
                id: a,
                text: a
            }), a = c.extend({}, {
                text: ""
            }, a);
            var b = {
                selected: !1,
                disabled: !1
            };
            return null != a.id && (a.id = a.id.toString()), null != a.text && (a.text = a.text.toString()), null == a._resultId && a.id && null != this.container && (a._resultId = this.generateResultId(this.container, a)), c.extend({}, b, a)
        }, d.prototype.matches = function(a, b) {
            var c = this.options.get("matcher");
            return c(a, b)
        }, d
    }), a("select2/data/array", ["./select", "../utils", "jquery"], function(a, b, c) {
        function d(a, b) {
            var c = b.get("data") || [];
            d.__super__.constructor.call(this, a, b), this.addOptions(this.convertToOptions(c))
        }
        return b.Extend(d, a), d.prototype.select = function(a) {
            var b = this.$element.find('option[value="' + a.id + '"]');
            0 === b.length && (b = this.option(a), this.addOptions([b])), d.__super__.select.call(this, a)
        }, d.prototype.convertToOptions = function(a) {
            function b(a) {
                return function() {
                    return c(this).val() == a.id
                }
            }
            for (var d = this, e = this.$element.find("option"), f = e.map(function() {
                    return d.item(c(this)).id
                }).get(), g = [], h = 0; h < a.length; h++) {
                var i = this._normalizeItem(a[h]);
                if (c.inArray(i.id, f) >= 0) {
                    var j = e.filter(b(i)),
                        k = this.item(j),
                        l = (c.extend(!0, {}, k, i), this.option(k));
                    j.replaceWith(l)
                } else {
                    var m = this.option(i);
                    if (i.children) {
                        var n = this.convertToOptions(i.children);
                        m.append(n)
                    }
                    g.push(m)
                }
            }
            return g
        }, d
    }), a("select2/data/ajax", ["./array", "../utils", "jquery"], function(a, b, c) {
        function d(b, c) {
            this.ajaxOptions = this._applyDefaults(c.get("ajax")), null != this.ajaxOptions.processResults && (this.processResults = this.ajaxOptions.processResults), a.__super__.constructor.call(this, b, c)
        }
        return b.Extend(d, a), d.prototype._applyDefaults = function(a) {
            var b = {
                data: function(a) {
                    return {
                        q: a.term
                    }
                },
                transport: function(a, b, d) {
                    var e = c.ajax(a);
                    return e.then(b), e.fail(d), e
                }
            };
            return c.extend({}, b, a, !0)
        }, d.prototype.processResults = function(a) {
            return a
        }, d.prototype.query = function(a, b) {
            function d() {
                var d = f.transport(f, function(d) {
                    var f = e.processResults(d, a);
                    window.console && console.error && (f && f.results && c.isArray(f.results) || console.error("Select2: The AJAX results did not return an array in the `results` key of the response.")), b(f)
                }, function() {});
                e._request = d
            }
            var e = this;
            this._request && (this._request.abort(), this._request = null);
            var f = c.extend({
                type: "GET"
            }, this.ajaxOptions);
            "function" == typeof f.url && (f.url = f.url(a)), "function" == typeof f.data && (f.data = f.data(a)), this.ajaxOptions.delay && "" !== a.term ? (this._queryTimeout && window.clearTimeout(this._queryTimeout), this._queryTimeout = window.setTimeout(d, this.ajaxOptions.delay)) : d()
        }, d
    }), a("select2/data/tags", ["jquery"], function(a) {
        function b(b, c, d) {
            var e = d.get("tags"),
                f = d.get("createTag");
            if (void 0 !== f && (this.createTag = f), b.call(this, c, d), a.isArray(e))
                for (var g = 0; g < e.length; g++) {
                    var h = e[g],
                        i = this._normalizeItem(h),
                        j = this.option(i);
                    this.$element.append(j)
                }
        }
        return b.prototype.query = function(a, b, c) {
            function d(a, f) {
                for (var g = a.results, h = 0; h < g.length; h++) {
                    var i = g[h],
                        j = null != i.children && !d({
                            results: i.children
                        }, !0),
                        k = i.text === b.term;
                    if (k || j) return f ? !1 : (a.data = g, void c(a))
                }
                if (f) return !0;
                var l = e.createTag(b);
                if (null != l) {
                    var m = e.option(l);
                    m.attr("data-select2-tag", !0), e.addOptions([m]), e.insertTag(g, l)
                }
                a.results = g, c(a)
            }
            var e = this;
            return this._removeOldTags(), null == b.term || "" === b.term || null != b.page ? void a.call(this, b, c) : void a.call(this, b, d)
        }, b.prototype.createTag = function(a, b) {
            return {
                id: b.term,
                text: b.term
            }
        }, b.prototype.insertTag = function(a, b, c) {
            b.unshift(c)
        }, b.prototype._removeOldTags = function() {
            var b = (this._lastTag, this.$element.find("option[data-select2-tag]"));
            b.each(function() {
                this.selected || a(this).remove()
            })
        }, b
    }), a("select2/data/tokenizer", ["jquery"], function(a) {
        function b(a, b, c) {
            var d = c.get("tokenizer");
            void 0 !== d && (this.tokenizer = d), a.call(this, b, c)
        }
        return b.prototype.bind = function(a, b, c) {
            a.call(this, b, c), this.$search = b.dropdown.$search || b.selection.$search || c.find(".select2-search__field")
        }, b.prototype.query = function(a, b, c) {
            function d(a) {
                e.select(a)
            }
            var e = this;
            b.term = b.term || "";
            var f = this.tokenizer(b, this.options, d);
            f.term !== b.term && (this.$search.length && (this.$search.val(f.term), this.$search.focus()), b.term = f.term), a.call(this, b, c)
        }, b.prototype.tokenizer = function(b, c, d, e) {
            for (var f = d.get("tokenSeparators") || [], g = c.term, h = 0, i = this.createTag || function(a) {
                    return {
                        id: a.term,
                        text: a.term
                    }
                }; h < g.length;) {
                var j = g[h];
                if (-1 !== a.inArray(j, f)) {
                    var k = g.substr(0, h),
                        l = a.extend({}, c, {
                            term: k
                        }),
                        m = i(l);
                    e(m), g = g.substr(h + 1) || "", h = 0
                } else h++
            }
            return {
                term: g
            }
        }, b
    }), a("select2/data/minimumInputLength", [], function() {
        function a(a, b, c) {
            this.minimumInputLength = c.get("minimumInputLength"), a.call(this, b, c)
        }
        return a.prototype.query = function(a, b, c) {
            return b.term = b.term || "", b.term.length < this.minimumInputLength ? void this.trigger("results:message", {
                message: "inputTooShort",
                args: {
                    minimum: this.minimumInputLength,
                    input: b.term,
                    params: b
                }
            }) : void a.call(this, b, c)
        }, a
    }), a("select2/data/maximumInputLength", [], function() {
        function a(a, b, c) {
            this.maximumInputLength = c.get("maximumInputLength"), a.call(this, b, c)
        }
        return a.prototype.query = function(a, b, c) {
            return b.term = b.term || "", this.maximumInputLength > 0 && b.term.length > this.maximumInputLength ? void this.trigger("results:message", {
                message: "inputTooLong",
                args: {
                    maximum: this.maximumInputLength,
                    input: b.term,
                    params: b
                }
            }) : void a.call(this, b, c)
        }, a
    }), a("select2/data/maximumSelectionLength", [], function() {
        function a(a, b, c) {
            this.maximumSelectionLength = c.get("maximumSelectionLength"), a.call(this, b, c)
        }
        return a.prototype.query = function(a, b, c) {
            var d = this;
            this.current(function(e) {
                var f = null != e ? e.length : 0;
                return d.maximumSelectionLength > 0 && f >= d.maximumSelectionLength ? void d.trigger("results:message", {
                    message: "maximumSelected",
                    args: {
                        maximum: d.maximumSelectionLength
                    }
                }) : void a.call(d, b, c)
            })
        }, a
    }), a("select2/dropdown", ["jquery", "./utils"], function(a, b) {
        function c(a, b) {
            this.$element = a, this.options = b, c.__super__.constructor.call(this)
        }
        return b.Extend(c, b.Observable), c.prototype.render = function() {
            var b = a('<span class="select2-dropdown"><span class="select2-results"></span></span>');
            return b.attr("dir", this.options.get("dir")), this.$dropdown = b, b
        }, c.prototype.position = function() {}, c.prototype.destroy = function() {
            this.$dropdown.remove()
        }, c
    }), a("select2/dropdown/search", ["jquery", "../utils"], function(a) {
        function b() {}
        return b.prototype.render = function(b) {
            var c = b.call(this),
                d = a('<span class="select2-search select2-search--dropdown"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" /></span>');
            return this.$searchContainer = d, this.$search = d.find("input"), c.prepend(d), c
        }, b.prototype.bind = function(b, c, d) {
            var e = this;
            b.call(this, c, d), this.$search.on("keydown", function(a) {
                e.trigger("keypress", a), e._keyUpPrevented = a.isDefaultPrevented()
            }), this.$search.on("input", function() {
                a(this).off("keyup")
            }), this.$search.on("keyup input", function(a) {
                e.handleSearch(a)
            }), c.on("open", function() {
                e.$search.attr("tabindex", 0), e.$search.focus(), window.setTimeout(function() {
                    e.$search.focus()
                }, 0)
            }), c.on("close", function() {
                e.$search.attr("tabindex", -1), e.$search.val("")
            }), c.on("results:all", function(a) {
                if (null == a.query.term || "" === a.query.term) {
                    var b = e.showSearch(a);
                    b ? e.$searchContainer.removeClass("select2-search--hide") : e.$searchContainer.addClass("select2-search--hide")
                }
            })
        }, b.prototype.handleSearch = function() {
            if (!this._keyUpPrevented) {
                var a = this.$search.val();
                this.trigger("query", {
                    term: a
                })
            }
            this._keyUpPrevented = !1
        }, b.prototype.showSearch = function() {
            return !0
        }, b
    }), a("select2/dropdown/hidePlaceholder", [], function() {
        function a(a, b, c, d) {
            this.placeholder = this.normalizePlaceholder(c.get("placeholder")), a.call(this, b, c, d)
        }
        return a.prototype.append = function(a, b) {
            b.results = this.removePlaceholder(b.results), a.call(this, b)
        }, a.prototype.normalizePlaceholder = function(a, b) {
            return "string" == typeof b && (b = {
                id: "",
                text: b
            }), b
        }, a.prototype.removePlaceholder = function(a, b) {
            for (var c = b.slice(0), d = b.length - 1; d >= 0; d--) {
                var e = b[d];
                this.placeholder.id === e.id && c.splice(d, 1)
            }
            return c
        }, a
    }), a("select2/dropdown/infiniteScroll", ["jquery"], function(a) {
        function b(a, b, c, d) {
            this.lastParams = {}, a.call(this, b, c, d), this.$loadingMore = this.createLoadingMore(), this.loading = !1
        }
        return b.prototype.append = function(a, b) {
            this.$loadingMore.remove(), this.loading = !1, a.call(this, b), this.showLoadingMore(b) && this.$results.append(this.$loadingMore)
        }, b.prototype.bind = function(b, c, d) {
            var e = this;
            b.call(this, c, d), c.on("query", function(a) {
                e.lastParams = a, e.loading = !0
            }), c.on("query:append", function(a) {
                e.lastParams = a, e.loading = !0
            }), this.$results.on("scroll", function() {
                var b = a.contains(document.documentElement, e.$loadingMore[0]);
                if (!e.loading && b) {
                    var c = e.$results.offset().top + e.$results.outerHeight(!1),
                        d = e.$loadingMore.offset().top + e.$loadingMore.outerHeight(!1);
                    c + 50 >= d && e.loadMore()
                }
            })
        }, b.prototype.loadMore = function() {
            this.loading = !0;
            var b = a.extend({}, {
                page: 1
            }, this.lastParams);
            b.page++, this.trigger("query:append", b)
        }, b.prototype.showLoadingMore = function(a, b) {
            return b.pagination && b.pagination.more
        }, b.prototype.createLoadingMore = function() {
            var b = a('<li class="option load-more" role="treeitem"></li>'),
                c = this.options.get("translations").get("loadingMore");
            return b.html(c(this.lastParams)), b
        }, b
    }), a("select2/dropdown/attachBody", ["jquery", "../utils"], function(a, b) {
        function c(a, b, c) {
            this.$dropdownParent = c.get("dropdownParent") || document.body, a.call(this, b, c)
        }
        return c.prototype.bind = function(a, b, c) {
            var d = this,
                e = !1;
            a.call(this, b, c), b.on("open", function() {
                d._showDropdown(), d._attachPositioningHandler(b), e || (e = !0, b.on("results:all", function() {
                    d._positionDropdown(), d._resizeDropdown()
                }), b.on("results:append", function() {
                    d._positionDropdown(), d._resizeDropdown()
                }))
            }), b.on("close", function() {
                d._hideDropdown(), d._detachPositioningHandler(b)
            }), this.$dropdownContainer.on("mousedown", function(a) {
                a.stopPropagation()
            })
        }, c.prototype.position = function(a, b, c) {
            b.attr("class", c.attr("class")), b.removeClass("select2"), b.addClass("select2-container--open"), b.css({
                position: "absolute",
                top: -999999
            }), this.$container = c
        }, c.prototype.render = function(b) {
            var c = a("<span></span>"),
                d = b.call(this);
            return c.append(d), this.$dropdownContainer = c, c
        }, c.prototype._hideDropdown = function() {
            this.$dropdownContainer.detach()
        }, c.prototype._attachPositioningHandler = function(c) {
            var d = this,
                e = "scroll.select2." + c.id,
                f = "resize.select2." + c.id,
                g = "orientationchange.select2." + c.id,
                h = this.$container.parents().filter(b.hasScroll);
            h.each(function() {
                a(this).data("select2-scroll-position", {
                    x: a(this).scrollLeft(),
                    y: a(this).scrollTop()
                })
            }), h.on(e, function() {
                var b = a(this).data("select2-scroll-position");
                a(this).scrollTop(b.y)
            }), a(window).on(e + " " + f + " " + g, function() {
                d._positionDropdown(), d._resizeDropdown()
            })
        }, c.prototype._detachPositioningHandler = function(c) {
            var d = "scroll.select2." + c.id,
                e = "resize.select2." + c.id,
                f = "orientationchange.select2." + c.id,
                g = this.$container.parents().filter(b.hasScroll);
            g.off(d), a(window).off(d + " " + e + " " + f)
        }, c.prototype._positionDropdown = function() {
            var b = a(window),
                c = this.$dropdown.hasClass("select2-dropdown--above"),
                d = this.$dropdown.hasClass("select2-dropdown--below"),
                e = null,
                f = (this.$container.position(), this.$container.offset());
            f.bottom = f.top + this.$container.outerHeight(!1);
            var g = {
                height: this.$container.outerHeight(!1)
            };
            g.top = f.top, g.bottom = f.top + g.height;
            var h = {
                height: this.$dropdown.outerHeight(!1)
            }, i = {
                    top: b.scrollTop(),
                    bottom: b.scrollTop() + b.height()
                }, j = i.top < f.top - h.height,
                k = i.bottom > f.bottom + h.height,
                l = {
                    left: f.left,
                    top: g.bottom
                };
            c || d || (e = "below"), k || !j || c ? !j && k && c && (e = "below") : e = "above", ("above" == e || c && "below" !== e) && (l.top = g.top - h.height), null != e && (this.$dropdown.removeClass("select2-dropdown--below select2-dropdown--above").addClass("select2-dropdown--" + e), this.$container.removeClass("select2-container--below select2-container--above").addClass("select2-container--" + e)), this.$dropdownContainer.css(l)
        }, c.prototype._resizeDropdown = function() {
            this.$dropdownContainer.width(), this.$dropdown.css({
                width: this.$container.outerWidth(!1) + "px"
            })
        }, c.prototype._showDropdown = function() {
            this.$dropdownContainer.appendTo(this.$dropdownParent), this._positionDropdown(), this._resizeDropdown()
        }, c
    }), a("select2/dropdown/minimumResultsForSearch", [], function() {
        function a(b) {
            for (var c = 0, d = 0; d < b.length; d++) {
                var e = b[d];
                e.children ? c += a(e.children) : c++
            }
            return c
        }

        function b(a, b, c, d) {
            this.minimumResultsForSearch = c.get("minimumResultsForSearch"), this.minimumResultsForSearch < 0 && (this.minimumResultsForSearch = 1 / 0), a.call(this, b, c, d)
        }
        return b.prototype.showSearch = function(b, c) {
            return a(c.data.results) < this.minimumResultsForSearch ? !1 : b.call(this, c)
        }, b
    }), a("select2/dropdown/selectOnClose", [], function() {
        function a() {}
        return a.prototype.bind = function(a, b, c) {
            var d = this;
            a.call(this, b, c), b.on("close", function() {
                d._handleSelectOnClose()
            })
        }, a.prototype._handleSelectOnClose = function() {
            var a = this.getHighlightedResults();
            a.length < 1 || a.trigger("mouseup")
        }, a
    }), a("select2/dropdown/closeOnSelect", [], function() {
        function a() {}
        return a.prototype.bind = function(a, b, c) {
            var d = this;
            a.call(this, b, c), b.on("select", function(a) {
                d._selectTriggered(a)
            }), b.on("unselect", function(a) {
                d._selectTriggered(a)
            })
        }, a.prototype._selectTriggered = function(a, b) {
            var c = b.originalEvent;
            c && c.ctrlKey || this.trigger("close")
        }, a
    }), a("select2/i18n/en", [], function() {
        return {
            errorLoading: function() {
                return "The results could not be loaded."
            },
            inputTooLong: function(a) {
                var b = a.input.length - a.maximum,
                    c = "Please delete " + b + " character";
                return 1 != b && (c += "s"), c
            },
            inputTooShort: function(a) {
                var b = a.minimum - a.input.length,
                    c = "Please enter " + b + " or more characters";
                return c
            },
            loadingMore: function() {
                return "Loading more results…"
            },
            maximumSelected: function(a) {
                var b = "You can only select " + a.maximum + " item";
                return 1 != a.maximum && (b += "s"), b
            },
            noResults: function() {
                return "No results found"
            },
            searching: function() {
                return "Searching…"
            }
        }
    }), a("select2/defaults", ["jquery", "./results", "./selection/single", "./selection/multiple", "./selection/placeholder", "./selection/allowClear", "./selection/search", "./selection/eventRelay", "./utils", "./translation", "./diacritics", "./data/select", "./data/array", "./data/ajax", "./data/tags", "./data/tokenizer", "./data/minimumInputLength", "./data/maximumInputLength", "./data/maximumSelectionLength", "./dropdown", "./dropdown/search", "./dropdown/hidePlaceholder", "./dropdown/infiniteScroll", "./dropdown/attachBody", "./dropdown/minimumResultsForSearch", "./dropdown/selectOnClose", "./dropdown/closeOnSelect", "./i18n/en"], function(a, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z, A, B, C) {
        function D() {
            this.reset()
        }
        D.prototype.apply = function(l) {
            if (l = a.extend({}, this.defaults, l), null == l.dataAdapter) {
                if (l.dataAdapter = null != l.ajax ? o : null != l.data ? n : m, l.minimumInputLength > 0 && (l.dataAdapter = j.Decorate(l.dataAdapter, r)), l.maximumInputLength > 0 && (l.dataAdapter = j.Decorate(l.dataAdapter, s)), l.maximumSelectionLength > 0 && (l.dataAdapter = j.Decorate(l.dataAdapter, t)), null != l.tags && (l.dataAdapter = j.Decorate(l.dataAdapter, p)), (null != l.tokenSeparators || null != l.tokenizer) && (l.dataAdapter = j.Decorate(l.dataAdapter, q)), null != l.query) {
                    var C = b(l.amdBase + "compat/query");
                    l.dataAdapter = j.Decorate(l.dataAdapter, C)
                }
                if (null != l.initSelection) {
                    var D = b(l.amdBase + "compat/initSelection");
                    l.dataAdapter = j.Decorate(l.dataAdapter, D)
                }
            }
            if (null == l.resultsAdapter && (l.resultsAdapter = c, null != l.ajax && (l.resultsAdapter = j.Decorate(l.resultsAdapter, x)), null != l.placeholder && (l.resultsAdapter = j.Decorate(l.resultsAdapter, w)), l.selectOnClose && (l.resultsAdapter = j.Decorate(l.resultsAdapter, A))), null == l.dropdownAdapter) {
                if (l.multiple) l.dropdownAdapter = u;
                else {
                    var E = j.Decorate(u, v);
                    l.dropdownAdapter = E
                }
                0 !== l.minimumResultsForSearch && (l.dropdownAdapter = j.Decorate(l.dropdownAdapter, z)), l.closeOnSelect && (l.dropdownAdapter = j.Decorate(l.dropdownAdapter, B)), l.dropdownAdapter = j.Decorate(l.dropdownAdapter, y)
            }
            if (null == l.selectionAdapter && (l.selectionAdapter = l.multiple ? e : d, null != l.placeholder && (l.selectionAdapter = j.Decorate(l.selectionAdapter, f)), l.allowClear && (l.selectionAdapter = j.Decorate(l.selectionAdapter, g)), l.multiple && (l.selectionAdapter = j.Decorate(l.selectionAdapter, h)), l.selectionAdapter = j.Decorate(l.selectionAdapter, i)), "string" == typeof l.language)
                if (l.language.indexOf("-") > 0) {
                    var F = l.language.split("-"),
                        G = F[0];
                    l.language = [l.language, G]
                } else l.language = [l.language];
            if (a.isArray(l.language)) {
                var H = new k;
                l.language.push("en");
                for (var I = l.language, J = 0; J < I.length; J++) {
                    var K = I[J],
                        L = {};
                    try {
                        L = k.loadPath(K)
                    } catch (M) {
                        try {
                            K = this.defaults.amdLanguageBase + K, L = k.loadPath(K)
                        } catch (N) {
                            window.console && console.warn && console.warn('Select2: The lanugage file for "' + K + '" could not be automatically loaded. A fallback will be used instead.');
                            continue
                        }
                    }
                    H.extend(L)
                }
                l.translations = H
            } else l.translations = new k(l.language);
            return l
        }, D.prototype.reset = function() {
            function b(a) {
                function b(a) {
                    return l[a] || a
                }
                return a.replace(/[^\u0000-\u007E]/g, b)
            }

            function c(d, e) {
                if ("" === a.trim(d.term)) return e;
                if (e.children && e.children.length > 0) {
                    for (var f = a.extend(!0, {}, e), g = e.children.length - 1; g >= 0; g--) {
                        var h = e.children[g],
                            i = c(d, h);
                        null == i && f.children.splice(g, 1)
                    }
                    return f.children.length > 0 ? f : c(d, f)
                }
                var j = b(e.text).toUpperCase(),
                    k = b(d.term).toUpperCase();
                return j.indexOf(k) > -1 ? e : null
            }
            this.defaults = {
                amdBase: "select2/",
                amdLanguageBase: "select2/i18n/",
                closeOnSelect: !0,
                escapeMarkup: j.escapeMarkup,
                language: C,
                matcher: c,
                minimumInputLength: 0,
                maximumInputLength: 0,
                maximumSelectionLength: 0,
                minimumResultsForSearch: 0,
                selectOnClose: !1,
                sorter: function(a) {
                    return a
                },
                templateResult: function(a) {
                    return a.text
                },
                templateSelection: function(a) {
                    return a.text
                },
                theme: "default",
                width: "resolve"
            }
        }, D.prototype.set = function(b, c) {
            var d = a.camelCase(b),
                e = {};
            e[d] = c;
            var f = j._convertData(e);
            a.extend(this.defaults, f)
        };
        var E = new D;
        return E
    }), a("select2/options", ["jquery", "./defaults", "./utils"], function(a, c, d) {
        function e(a, e) {
            if (this.options = a, null != e && this.fromElement(e), this.options = c.apply(this.options), e && e.is("input")) {
                var f = b(this.get("amdBase") + "compat/inputData");
                this.options.dataAdapter = d.Decorate(this.options.dataAdapter, f)
            }
        }
        return e.prototype.fromElement = function(b) {
            var c = ["select2"];
            null == this.options.multiple && (this.options.multiple = b.prop("multiple")), null == this.options.disabled && (this.options.disabled = b.prop("disabled")), null == this.options.language && (b.prop("lang") ? this.options.language = b.prop("lang").toLowerCase() : b.closest("[lang]").prop("lang") && (this.options.language = b.closest("[lang]").prop("lang"))), null == this.options.dir && (this.options.dir = b.prop("dir") ? b.prop("dir") : b.closest("[dir]").prop("dir") ? b.closest("[dir]").prop("dir") : "ltr"), b.prop("disabled", this.options.disabled), b.prop("multiple", this.options.multiple), b.data("select2Tags") && (window.console && console.warn && console.warn('Select2: The `data-select2-tags` attribute has been changed to use the `data-data` and `data-tags="true"` attributes and will be removed in future versions of Select2.'), b.data("data", b.data("select2Tags")), b.data("tags", !0)), b.data("ajaxUrl") && (window.console && console.warn && console.warn("Select2: The `data-ajax-url` attribute has been changed to `data-ajax--url` and support for the old attribute will be removed in future versions of Select2."), b.data("ajax-Url", b.data("ajaxUrl")));
            var e = {};
            e = a.fn.jquery && "1." == a.fn.jquery.substr(0, 2) && b[0].dataset ? a.extend(!0, {}, b[0].dataset, b.data()) : b.data();
            var f = a.extend(!0, {}, e);
            f = d._convertData(f);
            for (var g in f) a.inArray(g, c) > -1 || (a.isPlainObject(this.options[g]) ? a.extend(this.options[g], f[g]) : this.options[g] = f[g]);
            return this
        }, e.prototype.get = function(a) {
            return this.options[a]
        }, e.prototype.set = function(a, b) {
            this.options[a] = b
        }, e
    }), a("select2/core", ["jquery", "./options", "./utils", "./keys"], function(a, b, c, d) {
        var e = function(a, c) {
            null != a.data("select2") && a.data("select2").destroy(), this.$element = a, this.id = this._generateId(a), c = c || {}, this.options = new b(c, a), e.__super__.constructor.call(this);
            var d = a.attr("tabindex") || 0;
            a.data("old-tabindex", d), a.attr("tabindex", "-1");
            var f = this.options.get("dataAdapter");
            this.data = new f(a, this.options);
            var g = this.render();
            this._placeContainer(g);
            var h = this.options.get("selectionAdapter");
            this.selection = new h(a, this.options), this.$selection = this.selection.render(), this.selection.position(this.$selection, g);
            var i = this.options.get("dropdownAdapter");
            this.dropdown = new i(a, this.options), this.$dropdown = this.dropdown.render(), this.dropdown.position(this.$dropdown, g);
            var j = this.options.get("resultsAdapter");
            this.results = new j(a, this.options, this.data), this.$results = this.results.render(), this.results.position(this.$results, this.$dropdown);
            var k = this;
            this._bindAdapters(), this._registerDomEvents(), this._registerDataEvents(), this._registerSelectionEvents(), this._registerDropdownEvents(), this._registerResultsEvents(), this._registerEvents(), this.data.current(function(a) {
                k.trigger("selection:update", {
                    data: a
                })
            }), a.hide(), this._syncAttributes(), a.data("select2", this)
        };
        return c.Extend(e, c.Observable), e.prototype._generateId = function(a) {
            var b = "";
            return b = null != a.attr("id") ? a.attr("id") : null != a.attr("name") ? a.attr("name") + "-" + c.generateChars(2) : c.generateChars(4), b = "select2-" + b
        }, e.prototype._placeContainer = function(a) {
            a.insertAfter(this.$element);
            var b = this._resolveWidth(this.$element, this.options.get("width"));
            null != b && a.css("width", b)
        }, e.prototype._resolveWidth = function(a, b) {
            var c = /^width:(([-+]?([0-9]*\.)?[0-9]+)(px|em|ex|%|in|cm|mm|pt|pc))/i;
            if ("resolve" == b) {
                var d = this._resolveWidth(a, "style");
                return null != d ? d : this._resolveWidth(a, "element")
            }
            if ("element" == b) {
                var e = a.outerWidth(!1);
                return 0 >= e ? "auto" : e + "px"
            }
            if ("style" == b) {
                var f = a.attr("style");
                if ("string" != typeof f) return null;
                for (var g = f.split(";"), h = 0, i = g.length; i > h; h += 1) {
                    var j = g[h].replace(/\s/g, ""),
                        k = j.match(c);
                    if (null !== k && k.length >= 1) return k[1]
                }
                return null
            }
            return b
        }, e.prototype._bindAdapters = function() {
            this.data.bind(this, this.$container), this.selection.bind(this, this.$container), this.dropdown.bind(this, this.$container), this.results.bind(this, this.$container)
        }, e.prototype._registerDomEvents = function() {
            var b = this;
            this.$element.on("change.select2", function() {
                b.data.current(function(a) {
                    b.trigger("selection:update", {
                        data: a
                    })
                })
            }), this._sync = c.bind(this._syncAttributes, this), this.$element[0].attachEvent && this.$element[0].attachEvent("onpropertychange", this._sync);
            var d = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;
            null != d ? (this._observer = new d(function(c) {
                a.each(c, b._sync)
            }), this._observer.observe(this.$element[0], {
                attributes: !0,
                subtree: !1
            })) : this.$element[0].addEventListener && this.$element[0].addEventListener("DOMAttrModified", b._sync, !1)
        }, e.prototype._registerDataEvents = function() {
            var a = this;
            this.data.on("*", function(b, c) {
                a.trigger(b, c)
            })
        }, e.prototype._registerSelectionEvents = function() {
            var b = this,
                c = ["toggle"];
            this.selection.on("toggle", function() {
                b.toggleDropdown()
            }), this.selection.on("*", function(d, e) {
                -1 === a.inArray(d, c) && b.trigger(d, e)
            })
        }, e.prototype._registerDropdownEvents = function() {
            var a = this;
            this.dropdown.on("*", function(b, c) {
                a.trigger(b, c)
            })
        }, e.prototype._registerResultsEvents = function() {
            var a = this;
            this.results.on("*", function(b, c) {
                a.trigger(b, c)
            })
        }, e.prototype._registerEvents = function() {
            var a = this;
            this.on("open", function() {
                a.$container.addClass("select2-container--open")
            }), this.on("close", function() {
                a.$container.removeClass("select2-container--open")
            }), this.on("enable", function() {
                a.$container.removeClass("select2-container--disabled")
            }), this.on("disable", function() {
                a.$container.addClass("select2-container--disabled")
            }), this.on("focus", function() {
                a.$container.addClass("select2-container--focus")
            }), this.on("blur", function() {
                a.$container.removeClass("select2-container--focus")
            }), this.on("query", function(b) {
                a.isOpen() || a.trigger("open"), this.data.query(b, function(c) {
                    a.trigger("results:all", {
                        data: c,
                        query: b
                    })
                })
            }), this.on("query:append", function(b) {
                this.data.query(b, function(c) {
                    a.trigger("results:append", {
                        data: c,
                        query: b
                    })
                })
            }), this.on("keypress", function(b) {
                var c = b.which;
                a.isOpen() ? c === d.ENTER ? (a.trigger("results:select"), b.preventDefault()) : c === d.SPACE && b.ctrlKey ? (a.trigger("results:toggle"), b.preventDefault()) : c === d.UP ? (a.trigger("results:previous"), b.preventDefault()) : c === d.DOWN ? (a.trigger("results:next"), b.preventDefault()) : (c === d.ESC || c === d.TAB) && (a.close(), b.preventDefault()) : (c === d.ENTER || c === d.SPACE || (c === d.DOWN || c === d.UP) && b.altKey) && (a.open(), b.preventDefault())
            })
        }, e.prototype._syncAttributes = function() {
            this.options.set("disabled", this.$element.prop("disabled")), this.options.get("disabled") ? (this.isOpen() && this.close(), this.trigger("disable")) : this.trigger("enable")
        }, e.prototype.trigger = function(a, b) {
            var c = e.__super__.trigger,
                d = {
                    open: "opening",
                    close: "closing",
                    select: "selecting",
                    unselect: "unselecting"
                };
            if (a in d) {
                var f = d[a],
                    g = {
                        prevented: !1,
                        name: a,
                        args: b
                    };
                if (c.call(this, f, g), g.prevented) return void(b.prevented = !0)
            }
            c.call(this, a, b)
        }, e.prototype.toggleDropdown = function() {
            this.options.get("disabled") || (this.isOpen() ? this.close() : this.open())
        }, e.prototype.open = function() {
            this.isOpen() || (this.trigger("query", {}), this.trigger("open"))
        }, e.prototype.close = function() {
            this.isOpen() && this.trigger("close")
        }, e.prototype.isOpen = function() {
            return this.$container.hasClass("select2-container--open")
        }, e.prototype.enable = function(a) {
            window.console && console.warn && console.warn('Select2: The `select2("enable")` method has been deprecated and will be removed in later Select2 versions. Use $element.prop("disabled") instead.'), 0 === a.length && (a = [!0]);
            var b = !a[0];
            this.$element.prop("disabled", b)
        }, e.prototype.data = function() {
            arguments.length > 0 && window.console && console.warn && console.warn('Select2: Data can no longer be set using `select2("data")`. You should consider setting the value instead using `$element.val()`.');
            var a = [];
            return this.dataAdpater.current(function(b) {
                a = b
            }), a
        }, e.prototype.val = function(b) {
            if (window.console && console.warn && console.warn('Select2: The `select2("val")` method has been deprecated and will be removed in later Select2 versions. Use $element.val() instead.'),
                0 === b.length) return this.$element.val();
            var c = b[0];
            a.isArray(c) && (c = a.map(c, function(a) {
                return a.toString()
            })), this.$element.val(c).trigger("change")
        }, e.prototype.destroy = function() {
            this.$container.remove(), this.$element[0].detachEvent && this.$element[0].detachEvent("onpropertychange", this._sync), null != this._observer ? (this._observer.disconnect(), this._observer = null) : this.$element[0].removeEventListener && this.$element[0].removeEventListener("DOMAttrModified", this._sync, !1), this._sync = null, this.$element.off(".select2"), this.$element.attr("tabindex", this.$element.data("old-tabindex")), this.$element.show(), this.$element.removeData("select2"), this.data.destroy(), this.selection.destroy(), this.dropdown.destroy(), this.results.destroy(), this.data = null, this.selection = null, this.dropdown = null, this.results = null
        }, e.prototype.render = function() {
            var b = a('<span class="select2 select2-container"><span class="selection"></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>');
            return b.attr("dir", this.options.get("dir")), this.$container = b, this.$container.addClass("select2-container--" + this.options.get("theme")), b.data("element", this.$element), b
        }, e
    }), a("jquery.select2", ["jquery", "./select2/core", "./select2/defaults"], function(a, c, d) {
        try {
            b("jquery.mousewheel")
        } catch (e) {}
        return null == a.fn.select2 && (a.fn.select2 = function(b) {
            if (b = b || {}, "object" == typeof b) return this.each(function() {
                {
                    var d = a.extend({}, b, !0);
                    new c(a(this), d)
                }
            }), this;
            if ("string" == typeof b) {
                var d = this.data("select2"),
                    e = Array.prototype.slice.call(arguments, 1);
                return d[b](e)
            }
            throw new Error("Invalid arguments for Select2: " + b)
        }), null == a.fn.select2.defaults && (a.fn.select2.defaults = d), c
    }), b("jquery.select2"), jQuery.fn.select2.amd = {
        define: a,
        require: b
    }
}(),
function(a, b, c) {
    function d(a, b, d, e) {
        for (var f = [], g = 0; g < a.length; g++) {
            var h = tinycolor(a[g]),
                i = h.toHsl().l < .5 ? "sp-thumb-el sp-thumb-dark" : "sp-thumb-el sp-thumb-light";
            i += tinycolor.equals(b, a[g]) ? " sp-thumb-active" : "";
            var j = q ? "background-color:" + h.toRgbString() : "filter:" + h.toFilter(),
                k = 0 == h.toName() ? h.toRgbString() : h.toName();
            e[h.toHex()] != c && (k = e[h.toHex()]), f.push('<span title="' + k + '" data-color="' + h.toRgbString() + '" class="' + i + '"><span class="sp-thumb-inner" style="' + j + ';" /></span>')
        }
        return "<div class='sp-cf " + d + "'>" + f.join("") + "</div>"
    }

    function e() {
        for (var a = 0; a < o.length; a++) o[a] && o[a].hide()
    }

    function f(a, c) {
        var d = b.extend({}, n, a);
        return d.callbacks = {
            move: k(d.move, c),
            change: k(d.change, c),
            show: k(d.show, c),
            hide: k(d.hide, c),
            beforeShow: k(d.beforeShow, c)
        }, d
    }

    function g(g, i) {
        function k() {
            ra.toggleClass("sp-flat", R), ra.toggleClass("sp-input-disabled", !Q.showInput), ra.toggleClass("sp-alpha-enabled", Q.showAlpha), ra.toggleClass("sp-buttons-disabled", !Q.showButtons), ra.toggleClass("sp-palette-disabled", !Q.showPalette), ra.toggleClass("sp-palette-only", Q.showPaletteOnly), ra.toggleClass("sp-initial-disabled", !Q.showInitial), ra.addClass(Q.className), L()
        }

        function n() {
            function c(a) {
                return a.data && a.data.ignore ? (E(b(this).data("color")), H()) : (E(b(this).data("color")), K(!0), H(), C()), !1
            }
            if (p && ra.find("*:not(input)").attr("unselectable", "on"), k(), Fa && pa.after(Ga).hide(), R) pa.after(ra).hide();
            else {
                var d = "parent" === Q.appendTo ? pa.parent() : b(Q.appendTo);
                1 !== d.length && (d = b("body")), d.append(ra)
            } if (T && a.localStorage) {
                try {
                    var e = a.localStorage[T].split(",#");
                    e.length > 1 && (delete a.localStorage[T], b.each(e, function(a, b) {
                        t(b)
                    }))
                } catch (f) {}
                try {
                    ka = a.localStorage[T].split(";")
                } catch (f) {}
            }
            Ha.bind("click.spectrum touchstart.spectrum", function(a) {
                qa || A(), a.stopPropagation(), b(a.target).is("input") || a.preventDefault()
            }), (pa.is(":disabled") || Q.disabled === !0) && P(), ra.click(j), za.change(z), za.bind("paste", function() {
                setTimeout(z, 1)
            }), za.keydown(function(a) {
                13 == a.keyCode && z()
            }), Ca.text(Q.cancelText), Ca.bind("click.spectrum", function(a) {
                a.stopPropagation(), a.preventDefault(), C("cancel")
            }), Da.text(Q.chooseText), Da.bind("click.spectrum", function(a) {
                a.stopPropagation(), a.preventDefault(), G() && (K(!0), C())
            }), l(xa, function(a, b, c) {
                ha = a / ba, c.shiftKey && (ha = Math.round(10 * ha) / 10), H()
            }), l(ua, function(a, b) {
                ea = parseFloat(b / _), H()
            }, x, y), l(sa, function(a, b, c) {
                if (c.shiftKey) {
                    if (!na) {
                        var d = fa * Y,
                            e = Z - ga * Z,
                            f = Math.abs(a - d) > Math.abs(b - e);
                        na = f ? "x" : "y"
                    }
                } else na = null;
                var g = !na || "x" === na,
                    h = !na || "y" === na;
                g && (fa = parseFloat(a / Y)), h && (ga = parseFloat((Z - b) / Z)), H()
            }, x, y), Ja ? (E(Ja), I(), Ma = La || tinycolor(Ja).format, t(Ja)) : I(), R && B();
            var g = p ? "mousedown.spectrum" : "click.spectrum touchstart.spectrum";
            Aa.delegate(".sp-thumb-el", g, c), Ba.delegate(".sp-thumb-el:nth-child(1)", g, {
                ignore: !0
            }, c)
        }

        function t(c) {
            if (S) {
                var d = tinycolor(c).toRgbString();
                if (-1 === b.inArray(d, ka))
                    for (ka.push(d); ka.length > la;) ka.shift();
                if (T && a.localStorage) try {
                    a.localStorage[T] = ka.join(";")
                } catch (e) {}
            }
        }

        function u() {
            var a, b = [],
                c = ka,
                d = {};
            if (Q.showPalette) {
                for (var e = 0; e < ja.length; e++)
                    for (var f = 0; f < ja[e].length; f++) a = tinycolor(ja[e][f]).toRgbString(), d[a] = !0;
                for (e = 0; e < c.length; e++) a = tinycolor(c[e]).toRgbString(), d.hasOwnProperty(a) || (b.push(c[e]), d[a] = !0)
            }
            return b.reverse().slice(0, Q.maxSelectionSize)
        }

        function v() {
            var a = F(),
                c = b.map(ja, function(b, c) {
                    return d(b, a, "sp-palette-row sp-palette-row-" + c, Q.hexNames)
                });
            ka && c.push(d(u(), a, "sp-palette-row sp-palette-row-selection", Q.hexNames)), Aa.html(c.join(""))
        }

        function w() {
            if (Q.showInitial) {
                var a = Ka,
                    b = F();
                Ba.html(d([a, b], b, "sp-palette-row-initial", Q.hexNames))
            }
        }

        function x() {
            (0 >= Z || 0 >= Y || 0 >= _) && L(), ra.addClass(ma), na = null
        }

        function y() {
            ra.removeClass(ma)
        }

        function z() {
            var a = tinycolor(za.val());
            a.ok ? E(a) : za.addClass("sp-validation-error")
        }

        function A() {
            X ? C() : B()
        }

        function B() {
            var c = b.Event("beforeShow.spectrum");
            return X ? void L() : (pa.trigger(c, [F()]), void(V.beforeShow(F()) === !1 || c.isDefaultPrevented() || (e(), X = !0, b(oa).bind("click.spectrum", C), b(a).bind("resize.spectrum", W), Ga.addClass("sp-active"), ra.removeClass("sp-hidden"), Q.showPalette && v(), L(), I(), Ka = F(), w(), V.show(Ka), pa.trigger("show.spectrum", [Ka]))))
        }

        function C(c) {
            if ((!c || "click" != c.type || 2 != c.button) && X && !R) {
                X = !1, b(oa).unbind("click.spectrum", C), b(a).unbind("resize.spectrum", W), Ga.removeClass("sp-active"), ra.addClass("sp-hidden");
                var d = !tinycolor.equals(F(), Ka);
                d && (Na && "cancel" !== c ? K(!0) : D()), V.hide(F()), pa.trigger("hide.spectrum", [F()])
            }
        }

        function D() {
            E(Ka, !0)
        }

        function E(a, b) {
            if (!tinycolor.equals(a, F())) {
                var c = tinycolor(a),
                    d = c.toHsv();
                ea = d.h % 360 / 360, fa = d.s, ga = d.v, ha = d.a, I(), c.ok && !b && (Ma = La || c.format)
            }
        }

        function F(a) {
            return a = a || {}, tinycolor.fromRatio({
                h: ea,
                s: fa,
                v: ga,
                a: Math.round(100 * ha) / 100
            }, {
                format: a.format || Ma
            })
        }

        function G() {
            return !za.hasClass("sp-validation-error")
        }

        function H() {
            I(), V.move(F()), pa.trigger("move.spectrum", [F()])
        }

        function I() {
            za.removeClass("sp-validation-error"), J();
            var a = tinycolor.fromRatio({
                h: ea,
                s: 1,
                v: 1
            });
            sa.css("background-color", a.toHexString());
            var b = Ma;
            1 > ha && ("hex" === b || "hex3" === b || "hex6" === b || "name" === b) && (b = "rgb");
            var c = F({
                format: b
            }),
                d = c.toHexString(),
                e = c.toRgbString();
            if (q || 1 === c.alpha ? Ia.css("background-color", e) : (Ia.css("background-color", "transparent"), Ia.css("filter", c.toFilter())), Q.showAlpha) {
                var f = c.toRgb();
                f.a = 0;
                var g = tinycolor(f).toRgbString(),
                    h = "linear-gradient(left, " + g + ", " + d + ")";
                p ? wa.css("filter", tinycolor(g).toFilter({
                    gradientType: 1
                }, d)) : (wa.css("background", "-webkit-" + h), wa.css("background", "-moz-" + h), wa.css("background", "-ms-" + h), wa.css("background", h))
            }
            Q.showInput && za.val(c.toString(b)), Q.showPalette && v(), w()
        }

        function J() {
            var a = fa,
                b = ga,
                c = a * Y,
                d = Z - b * Z;
            c = Math.max(-$, Math.min(Y - $, c - $)), d = Math.max(-$, Math.min(Z - $, d - $)), ta.css({
                top: d,
                left: c
            });
            var e = ha * ba;
            ya.css({
                left: e - ca / 2
            });
            var f = ea * _;
            va.css({
                top: f - da
            })
        }

        function K(a) {
            var b = F();
            Ea && pa.val(b.toString(Ma)).change();
            var c = !tinycolor.equals(b, Ka);
            Ka = b, t(b), a && c && (V.change(b), pa.trigger("change.spectrum", [b]))
        }

        function L() {
            Y = sa.width(), Z = sa.height(), $ = ta.height(), aa = ua.width(), _ = ua.height(), da = va.height(), ba = xa.width(), ca = ya.width(), R || (ra.css("position", "absolute"), ra.offset(h(ra, Ha))), J()
        }

        function M() {
            pa.show(), Ha.unbind("click.spectrum touchstart.spectrum"), ra.remove(), Ga.remove(), o[Oa.id] = null
        }

        function N(a, d) {
            return a === c ? b.extend({}, Q) : d === c ? Q[a] : (Q[a] = d, void k())
        }

        function O() {
            qa = !1, pa.attr("disabled", !1), Ha.removeClass("sp-disabled")
        }

        function P() {
            C(), qa = !0, pa.attr("disabled", !0), Ha.addClass("sp-disabled")
        }
        var Q = f(i, g),
            R = Q.flat,
            S = Q.showSelectionPalette,
            T = Q.localStorageKey,
            U = Q.theme,
            V = Q.callbacks,
            W = m(L, 10),
            X = !1,
            Y = 0,
            Z = 0,
            $ = 0,
            _ = 0,
            aa = 0,
            ba = 0,
            ca = 0,
            da = 0,
            ea = 0,
            fa = 0,
            ga = 0,
            ha = 1,
            ia = Q.palette.slice(0),
            ja = b.isArray(ia[0]) ? ia : [ia],
            ka = Q.selectionPalette.slice(0),
            la = Q.maxSelectionSize,
            ma = "sp-dragging",
            na = null,
            oa = g.ownerDocument,
            pa = (oa.body, b(g)),
            qa = !1,
            ra = b(s, oa).addClass(U),
            sa = ra.find(".sp-color"),
            ta = ra.find(".sp-dragger"),
            ua = ra.find(".sp-hue"),
            va = ra.find(".sp-slider"),
            wa = ra.find(".sp-alpha-inner"),
            xa = ra.find(".sp-alpha"),
            ya = ra.find(".sp-alpha-handle"),
            za = ra.find(".sp-input"),
            Aa = ra.find(".sp-palette"),
            Ba = ra.find(".sp-initial"),
            Ca = ra.find(".sp-cancel"),
            Da = ra.find(".sp-choose"),
            Ea = pa.is("input"),
            Fa = Ea && !R,
            Ga = Fa ? b(r).addClass(U).addClass(Q.className) : b([]),
            Ha = Fa ? Ga : pa,
            Ia = Ga.find(".sp-preview-inner"),
            Ja = Q.color || Ea && pa.val(),
            Ka = !1,
            La = Q.preferredFormat,
            Ma = La,
            Na = !Q.showButtons || Q.clickoutFiresChange;
        n();
        var Oa = {
            show: B,
            hide: C,
            toggle: A,
            reflow: L,
            option: N,
            enable: O,
            disable: P,
            set: function(a) {
                E(a), K()
            },
            get: F,
            destroy: M,
            container: ra
        };
        return Oa.id = o.push(Oa) - 1, Oa
    }

    function h(a, c) {
        var d = 0,
            e = a.outerWidth(),
            f = a.outerHeight(),
            g = c.outerHeight(),
            h = a[0].ownerDocument,
            i = h.documentElement,
            j = i.clientWidth + b(h).scrollLeft(),
            k = i.clientHeight + b(h).scrollTop(),
            l = c.offset();
        return l.top += g, l.left -= Math.min(l.left, l.left + e > j && j > e ? Math.abs(l.left + e - j) : 0), l.top -= Math.min(l.top, l.top + f > k && k > f ? Math.abs(f + g - d) : d), l
    }

    function i() {}

    function j(a) {
        a.stopPropagation()
    }

    function k(a, b) {
        var c = Array.prototype.slice,
            d = c.call(arguments, 2);
        return function() {
            return a.apply(b, d.concat(c.call(arguments)))
        }
    }

    function l(c, d, e, f) {
        function g(a) {
            a.stopPropagation && a.stopPropagation(), a.preventDefault && a.preventDefault(), a.returnValue = !1
        }

        function h(a) {
            if (l) {
                if (p && document.documentMode < 9 && !a.button) return j();
                var b = a.originalEvent.touches,
                    e = b ? b[0].pageX : a.pageX,
                    f = b ? b[0].pageY : a.pageY,
                    h = Math.max(0, Math.min(e - m.left, o)),
                    i = Math.max(0, Math.min(f - m.top, n));
                q && g(a), d.apply(c, [h, i, a])
            }
        }

        function i(a) {
            {
                var d = a.which ? 3 == a.which : 2 == a.button;
                a.originalEvent.touches
            }
            d || l || e.apply(c, arguments) !== !1 && (l = !0, n = b(c).height(), o = b(c).width(), m = b(c).offset(), b(k).bind(r), b(k.body).addClass("sp-dragging"), q || h(a), g(a))
        }

        function j() {
            l && (b(k).unbind(r), b(k.body).removeClass("sp-dragging"), f.apply(c, arguments)), l = !1
        }
        d = d || function() {}, e = e || function() {}, f = f || function() {};
        var k = c.ownerDocument || document,
            l = !1,
            m = {}, n = 0,
            o = 0,
            q = "ontouchstart" in a,
            r = {};
        r.selectstart = g, r.dragstart = g, r["touchmove mousemove"] = h, r["touchend mouseup"] = j, b(c).bind("touchstart mousedown", i)
    }

    function m(a, b, c) {
        var d;
        return function() {
            var e = this,
                f = arguments,
                g = function() {
                    d = null, a.apply(e, f)
                };
            c && clearTimeout(d), (c || !d) && (d = setTimeout(g, b))
        }
    }
    var n = {
        beforeShow: i,
        move: i,
        change: i,
        show: i,
        hide: i,
        hexNames: {},
        color: !1,
        flat: !1,
        showInput: !1,
        showButtons: !0,
        clickoutFiresChange: !1,
        showInitial: !1,
        showPalette: !1,
        showPaletteOnly: !1,
        showSelectionPalette: !0,
        localStorageKey: !1,
        appendTo: "body",
        maxSelectionSize: 7,
        cancelText: "cancel",
        chooseText: "choose",
        preferredFormat: !1,
        className: "",
        showAlpha: !1,
        theme: "sp-light",
        palette: ["fff", "000"],
        selectionPalette: [],
        disabled: !1
    }, o = [],
        p = !! /msie/i.exec(a.navigator.userAgent),
        q = function() {
            function a(a, b) {
                return !!~("" + a).indexOf(b)
            }
            var b = document.createElement("div"),
                c = b.style;
            return c.cssText = "background-color:rgba(0,0,0,.5)", a(c.backgroundColor, "rgba") || a(c.backgroundColor, "hsla")
        }(),
        r = ["<div class='sp-replacer'>", "<div class='sp-preview'><div class='sp-preview-inner'></div></div>", "<div class='sp-dd'>&#9660;</div>", "</div>"].join(""),
        s = function() {
            var a = "";
            if (p)
                for (var b = 1; 6 >= b; b++) a += "<div class='sp-" + b + "'></div>";
            return ["<div class='sp-container sp-hidden'>", "<div class='sp-palette-container'>", "<div class='sp-palette sp-thumb sp-cf'></div>", "</div>", "<div class='sp-picker-container'>", "<div class='sp-top sp-cf'>", "<div class='sp-fill'></div>", "<div class='sp-top-inner'>", "<div class='sp-color'>", "<div class='sp-sat'>", "<div class='sp-val'>", "<div class='sp-dragger'></div>", "</div>", "</div>", "</div>", "<div class='sp-hue'>", "<div class='sp-slider'></div>", a, "</div>", "</div>", "<div class='sp-alpha'><div class='sp-alpha-inner'><div class='sp-alpha-handle'></div></div></div>", "</div>", "<div class='sp-input-container sp-cf'>", "<input class='sp-input' type='text' spellcheck='false'  />", "</div>", "<div class='sp-initial sp-thumb sp-cf'></div>", "<div class='sp-button-container sp-cf'>", "<a class='sp-cancel' href='#'></a>", "<button class='sp-choose'></button>", "</div>", "</div>", "</div>"].join("")
        }(),
        t = "spectrum.id";
    b.fn.spectrum = function(a) {
        if ("string" == typeof a) {
            var c = this,
                d = Array.prototype.slice.call(arguments, 1);
            return this.each(function() {
                var e = o[b(this).data(t)];
                if (e) {
                    var f = e[a];
                    if (!f) throw new Error("Spectrum: no such method: '" + a + "'");
                    "get" == a ? c = e.get() : "container" == a ? c = e.container : "option" == a ? c = e.option.apply(e, d) : "destroy" == a ? (e.destroy(), b(this).removeData(t)) : f.apply(e, d)
                }
            }), c
        }
        return this.spectrum("destroy").each(function() {
            var c = g(this, a);
            b(this).data(t, c.id)
        })
    }, b.fn.spectrum.load = !0, b.fn.spectrum.loadOpts = {}, b.fn.spectrum.draggable = l, b.fn.spectrum.defaults = n, b.spectrum = {}, b.spectrum.localization = {}, b.spectrum.palettes = {}, b.fn.spectrum.processNativeColorInputs = function() {
        var a = b("<input type='color' value='!' />")[0],
            c = "color" === a.type && "!" != a.value;
        c || b("input[type=color]").spectrum({
            preferredFormat: "hex6"
        })
    },
    function(a) {
        function b(a, d) {
            if (a = a ? a : "", d = d || {}, "object" == typeof a && a.hasOwnProperty("_tc_id")) return a;
            var f = c(a),
                h = f.r,
                j = f.g,
                l = f.b,
                m = f.a,
                n = w(100 * m) / 100,
                o = d.format || f.format;
            return 1 > h && (h = w(h)), 1 > j && (j = w(j)), 1 > l && (l = w(l)), {
                ok: f.ok,
                format: o,
                _tc_id: u++,
                alpha: m,
                toHsv: function() {
                    var a = g(h, j, l);
                    return {
                        h: 360 * a.h,
                        s: a.s,
                        v: a.v,
                        a: m
                    }
                },
                toHsvString: function() {
                    var a = g(h, j, l),
                        b = w(360 * a.h),
                        c = w(100 * a.s),
                        d = w(100 * a.v);
                    return 1 == m ? "hsv(" + b + ", " + c + "%, " + d + "%)" : "hsva(" + b + ", " + c + "%, " + d + "%, " + n + ")"
                },
                toHsl: function() {
                    var a = e(h, j, l);
                    return {
                        h: 360 * a.h,
                        s: a.s,
                        l: a.l,
                        a: m
                    }
                },
                toHslString: function() {
                    var a = e(h, j, l),
                        b = w(360 * a.h),
                        c = w(100 * a.s),
                        d = w(100 * a.l);
                    return 1 == m ? "hsl(" + b + ", " + c + "%, " + d + "%)" : "hsla(" + b + ", " + c + "%, " + d + "%, " + n + ")"
                },
                toHex: function(a) {
                    return i(h, j, l, a)
                },
                toHexString: function(a) {
                    return "#" + i(h, j, l, a)
                },
                toRgb: function() {
                    return {
                        r: w(h),
                        g: w(j),
                        b: w(l),
                        a: m
                    }
                },
                toRgbString: function() {
                    return 1 == m ? "rgb(" + w(h) + ", " + w(j) + ", " + w(l) + ")" : "rgba(" + w(h) + ", " + w(j) + ", " + w(l) + ", " + n + ")"
                },
                toPercentageRgb: function() {
                    return {
                        r: w(100 * k(h, 255)) + "%",
                        g: w(100 * k(j, 255)) + "%",
                        b: w(100 * k(l, 255)) + "%",
                        a: m
                    }
                },
                toPercentageRgbString: function() {
                    return 1 == m ? "rgb(" + w(100 * k(h, 255)) + "%, " + w(100 * k(j, 255)) + "%, " + w(100 * k(l, 255)) + "%)" : "rgba(" + w(100 * k(h, 255)) + "%, " + w(100 * k(j, 255)) + "%, " + w(100 * k(l, 255)) + "%, " + n + ")"
                },
                toName: function() {
                    return B[i(h, j, l, !0)] || !1
                },
                toFilter: function(a) {
                    var c = i(h, j, l),
                        e = c,
                        f = Math.round(255 * parseFloat(m)).toString(16),
                        g = f,
                        k = d && d.gradientType ? "GradientType = 1, " : "";
                    if (a) {
                        var n = b(a);
                        e = n.toHex(), g = Math.round(255 * parseFloat(n.alpha)).toString(16)
                    }
                    return "progid:DXImageTransform.Microsoft.gradient(" + k + "startColorstr=#" + p(f) + c + ",endColorstr=#" + p(g) + e + ")"
                },
                toString: function(a) {
                    a = a || this.format;
                    var b = !1;
                    return "rgb" === a && (b = this.toRgbString()), "prgb" === a && (b = this.toPercentageRgbString()), ("hex" === a || "hex6" === a) && (b = this.toHexString()), "hex3" === a && (b = this.toHexString(!0)), "name" === a && (b = this.toName()), "hsl" === a && (b = this.toHslString()), "hsv" === a && (b = this.toHsvString()), b || this.toHexString()
                }
            }
        }

        function c(a) {
            var b = {
                r: 0,
                g: 0,
                b: 0
            }, c = 1,
                e = !1,
                g = !1;
            return "string" == typeof a && (a = r(a)), "object" == typeof a && (a.hasOwnProperty("r") && a.hasOwnProperty("g") && a.hasOwnProperty("b") ? (b = d(a.r, a.g, a.b), e = !0, g = "%" === String(a.r).substr(-1) ? "prgb" : "rgb") : a.hasOwnProperty("h") && a.hasOwnProperty("s") && a.hasOwnProperty("v") ? (a.s = q(a.s), a.v = q(a.v), b = h(a.h, a.s, a.v), e = !0, g = "hsv") : a.hasOwnProperty("h") && a.hasOwnProperty("s") && a.hasOwnProperty("l") && (a.s = q(a.s), a.l = q(a.l), b = f(a.h, a.s, a.l), e = !0, g = "hsl"), a.hasOwnProperty("a") && (c = a.a)), c = parseFloat(c), (isNaN(c) || 0 > c || c > 1) && (c = 1), {
                ok: e,
                format: a.format || g,
                r: x(255, y(b.r, 0)),
                g: x(255, y(b.g, 0)),
                b: x(255, y(b.b, 0)),
                a: c
            }
        }

        function d(a, b, c) {
            return {
                r: 255 * k(a, 255),
                g: 255 * k(b, 255),
                b: 255 * k(c, 255)
            }
        }

        function e(a, b, c) {
            a = k(a, 255), b = k(b, 255), c = k(c, 255);
            var d, e, f = y(a, b, c),
                g = x(a, b, c),
                h = (f + g) / 2;
            if (f == g) d = e = 0;
            else {
                var i = f - g;
                switch (e = h > .5 ? i / (2 - f - g) : i / (f + g), f) {
                    case a:
                        d = (b - c) / i + (c > b ? 6 : 0);
                        break;
                    case b:
                        d = (c - a) / i + 2;
                        break;
                    case c:
                        d = (a - b) / i + 4
                }
                d /= 6
            }
            return {
                h: d,
                s: e,
                l: h
            }
        }

        function f(a, b, c) {
            function d(a, b, c) {
                return 0 > c && (c += 1), c > 1 && (c -= 1), 1 / 6 > c ? a + 6 * (b - a) * c : .5 > c ? b : 2 / 3 > c ? a + (b - a) * (2 / 3 - c) * 6 : a
            }
            var e, f, g;
            if (a = k(a, 360), b = k(b, 100), c = k(c, 100), 0 === b) e = f = g = c;
            else {
                var h = .5 > c ? c * (1 + b) : c + b - c * b,
                    i = 2 * c - h;
                e = d(i, h, a + 1 / 3), f = d(i, h, a), g = d(i, h, a - 1 / 3)
            }
            return {
                r: 255 * e,
                g: 255 * f,
                b: 255 * g
            }
        }

        function g(a, b, c) {
            a = k(a, 255), b = k(b, 255), c = k(c, 255);
            var d, e, f = y(a, b, c),
                g = x(a, b, c),
                h = f,
                i = f - g;
            if (e = 0 === f ? 0 : i / f, f == g) d = 0;
            else {
                switch (f) {
                    case a:
                        d = (b - c) / i + (c > b ? 6 : 0);
                        break;
                    case b:
                        d = (c - a) / i + 2;
                        break;
                    case c:
                        d = (a - b) / i + 4
                }
                d /= 6
            }
            return {
                h: d,
                s: e,
                v: h
            }
        }

        function h(a, b, c) {
            a = 6 * k(a, 360), b = k(b, 100), c = k(c, 100);
            var d = v.floor(a),
                e = a - d,
                f = c * (1 - b),
                g = c * (1 - e * b),
                h = c * (1 - (1 - e) * b),
                i = d % 6,
                j = [c, g, f, f, h, c][i],
                l = [h, c, c, g, f, f][i],
                m = [f, f, h, c, c, g][i];
            return {
                r: 255 * j,
                g: 255 * l,
                b: 255 * m
            }
        }

        function i(a, b, c, d) {
            var e = [p(w(a).toString(16)), p(w(b).toString(16)), p(w(c).toString(16))];
            return d && e[0].charAt(0) == e[0].charAt(1) && e[1].charAt(0) == e[1].charAt(1) && e[2].charAt(0) == e[2].charAt(1) ? e[0].charAt(0) + e[1].charAt(0) + e[2].charAt(0) : e.join("")
        }

        function j(a) {
            var b = {};
            for (var c in a) a.hasOwnProperty(c) && (b[a[c]] = c);
            return b
        }

        function k(a, b) {
            n(a) && (a = "100%");
            var c = o(a);
            return a = x(b, y(0, parseFloat(a))), c && (a = parseInt(a * b, 10) / 100), v.abs(a - b) < 1e-6 ? 1 : a % b / parseFloat(b)
        }

        function l(a) {
            return x(1, y(0, a))
        }

        function m(a) {
            return parseInt(a, 16)
        }

        function n(a) {
            return "string" == typeof a && -1 != a.indexOf(".") && 1 === parseFloat(a)
        }

        function o(a) {
            return "string" == typeof a && -1 != a.indexOf("%")
        }

        function p(a) {
            return 1 == a.length ? "0" + a : "" + a
        }

        function q(a) {
            return 1 >= a && (a = 100 * a + "%"), a
        }

        function r(a) {
            a = a.replace(s, "").replace(t, "").toLowerCase();
            var b = !1;
            if (A[a]) a = A[a], b = !0;
            else if ("transparent" == a) return {
                r: 0,
                g: 0,
                b: 0,
                a: 0
            };
            var c;
            return (c = C.rgb.exec(a)) ? {
                r: c[1],
                g: c[2],
                b: c[3]
            } : (c = C.rgba.exec(a)) ? {
                r: c[1],
                g: c[2],
                b: c[3],
                a: c[4]
            } : (c = C.hsl.exec(a)) ? {
                h: c[1],
                s: c[2],
                l: c[3]
            } : (c = C.hsla.exec(a)) ? {
                h: c[1],
                s: c[2],
                l: c[3],
                a: c[4]
            } : (c = C.hsv.exec(a)) ? {
                h: c[1],
                s: c[2],
                v: c[3]
            } : (c = C.hex6.exec(a)) ? {
                r: m(c[1]),
                g: m(c[2]),
                b: m(c[3]),
                format: b ? "name" : "hex"
            } : (c = C.hex3.exec(a)) ? {
                r: m(c[1] + "" + c[1]),
                g: m(c[2] + "" + c[2]),
                b: m(c[3] + "" + c[3]),
                format: b ? "name" : "hex"
            } : !1
        }
        var s = /^[\s,#]+/,
            t = /\s+$/,
            u = 0,
            v = Math,
            w = v.round,
            x = v.min,
            y = v.max,
            z = v.random;
        b.fromRatio = function(a, c) {
            if ("object" == typeof a) {
                var d = {};
                for (var e in a) a.hasOwnProperty(e) && (d[e] = "a" === e ? a[e] : q(a[e]));
                a = d
            }
            return b(a, c)
        }, b.equals = function(a, c) {
            return a && c ? b(a).toRgbString() == b(c).toRgbString() : !1
        }, b.random = function() {
            return b.fromRatio({
                r: z(),
                g: z(),
                b: z()
            })
        }, b.desaturate = function(a, c) {
            var d = b(a).toHsl();
            return d.s -= (c || 10) / 100, d.s = l(d.s), b(d)
        }, b.saturate = function(a, c) {
            var d = b(a).toHsl();
            return d.s += (c || 10) / 100, d.s = l(d.s), b(d)
        }, b.greyscale = function(a) {
            return b.desaturate(a, 100)
        }, b.lighten = function(a, c) {
            var d = b(a).toHsl();
            return d.l += (c || 10) / 100, d.l = l(d.l), b(d)
        }, b.darken = function(a, c) {
            var d = b(a).toHsl();
            return d.l -= (c || 10) / 100, d.l = l(d.l), b(d)
        }, b.complement = function(a) {
            var c = b(a).toHsl();
            return c.h = (c.h + 180) % 360, b(c)
        }, b.triad = function(a) {
            var c = b(a).toHsl(),
                d = c.h;
            return [b(a), b({
                h: (d + 120) % 360,
                s: c.s,
                l: c.l
            }), b({
                h: (d + 240) % 360,
                s: c.s,
                l: c.l
            })]
        }, b.tetrad = function(a) {
            var c = b(a).toHsl(),
                d = c.h;
            return [b(a), b({
                h: (d + 90) % 360,
                s: c.s,
                l: c.l
            }), b({
                h: (d + 180) % 360,
                s: c.s,
                l: c.l
            }), b({
                h: (d + 270) % 360,
                s: c.s,
                l: c.l
            })]
        }, b.splitcomplement = function(a) {
            var c = b(a).toHsl(),
                d = c.h;
            return [b(a), b({
                h: (d + 72) % 360,
                s: c.s,
                l: c.l
            }), b({
                h: (d + 216) % 360,
                s: c.s,
                l: c.l
            })]
        }, b.analogous = function(a, c, d) {
            c = c || 6, d = d || 30;
            var e = b(a).toHsl(),
                f = 360 / d,
                g = [b(a)];
            for (e.h = (e.h - (f * c >> 1) + 720) % 360; --c;) e.h = (e.h + f) % 360, g.push(b(e));
            return g
        }, b.monochromatic = function(a, c) {
            c = c || 6;
            for (var d = b(a).toHsv(), e = d.h, f = d.s, g = d.v, h = [], i = 1 / c; c--;) h.push(b({
                h: e,
                s: f,
                v: g
            })), g = (g + i) % 1;
            return h
        }, b.readability = function(a, c) {
            var d = b(a).toRgb(),
                e = b(c).toRgb(),
                f = (299 * d.r + 587 * d.g + 114 * d.b) / 1e3,
                g = (299 * e.r + 587 * e.g + 114 * e.b) / 1e3,
                h = Math.max(d.r, e.r) - Math.min(d.r, e.r) + Math.max(d.g, e.g) - Math.min(d.g, e.g) + Math.max(d.b, e.b) - Math.min(d.b, e.b);
            return {
                brightness: Math.abs(f - g),
                color: h
            }
        }, b.readable = function(a, c) {
            var d = b.readability(a, c);
            return d.brightness > 125 && d.color > 500
        }, b.mostReadable = function(a, c) {
            for (var d = null, e = 0, f = !1, g = 0; g < c.length; g++) {
                var h = b.readability(a, c[g]),
                    i = h.brightness > 125 && h.color > 500,
                    j = 3 * (h.brightness / 125) + h.color / 500;
                (i && !f || i && f && j > e || !i && !f && j > e) && (f = i, e = j, d = b(c[g]))
            }
            return d
        };
        var A = b.names = {
            aliceblue: "f0f8ff",
            antiquewhite: "faebd7",
            aqua: "0ff",
            aquamarine: "7fffd4",
            azure: "f0ffff",
            beige: "f5f5dc",
            bisque: "ffe4c4",
            black: "000",
            blanchedalmond: "ffebcd",
            blue: "00f",
            blueviolet: "8a2be2",
            brown: "a52a2a",
            burlywood: "deb887",
            burntsienna: "ea7e5d",
            cadetblue: "5f9ea0",
            chartreuse: "7fff00",
            chocolate: "d2691e",
            coral: "ff7f50",
            cornflowerblue: "6495ed",
            cornsilk: "fff8dc",
            crimson: "dc143c",
            cyan: "0ff",
            darkblue: "00008b",
            darkcyan: "008b8b",
            darkgoldenrod: "b8860b",
            darkgray: "a9a9a9",
            darkgreen: "006400",
            darkgrey: "a9a9a9",
            darkkhaki: "bdb76b",
            darkmagenta: "8b008b",
            darkolivegreen: "556b2f",
            darkorange: "ff8c00",
            darkorchid: "9932cc",
            darkred: "8b0000",
            darksalmon: "e9967a",
            darkseagreen: "8fbc8f",
            darkslateblue: "483d8b",
            darkslategray: "2f4f4f",
            darkslategrey: "2f4f4f",
            darkturquoise: "00ced1",
            darkviolet: "9400d3",
            deeppink: "ff1493",
            deepskyblue: "00bfff",
            dimgray: "696969",
            dimgrey: "696969",
            dodgerblue: "1e90ff",
            firebrick: "b22222",
            floralwhite: "fffaf0",
            forestgreen: "228b22",
            fuchsia: "f0f",
            gainsboro: "dcdcdc",
            ghostwhite: "f8f8ff",
            gold: "ffd700",
            goldenrod: "daa520",
            gray: "808080",
            green: "008000",
            greenyellow: "adff2f",
            grey: "808080",
            honeydew: "f0fff0",
            hotpink: "ff69b4",
            indianred: "cd5c5c",
            indigo: "4b0082",
            ivory: "fffff0",
            khaki: "f0e68c",
            lavender: "e6e6fa",
            lavenderblush: "fff0f5",
            lawngreen: "7cfc00",
            lemonchiffon: "fffacd",
            lightblue: "add8e6",
            lightcoral: "f08080",
            lightcyan: "e0ffff",
            lightgoldenrodyellow: "fafad2",
            lightgray: "d3d3d3",
            lightgreen: "90ee90",
            lightgrey: "d3d3d3",
            lightpink: "ffb6c1",
            lightsalmon: "ffa07a",
            lightseagreen: "20b2aa",
            lightskyblue: "87cefa",
            lightslategray: "789",
            lightslategrey: "789",
            lightsteelblue: "b0c4de",
            lightyellow: "ffffe0",
            lime: "0f0",
            limegreen: "32cd32",
            linen: "faf0e6",
            magenta: "f0f",
            maroon: "800000",
            mediumaquamarine: "66cdaa",
            mediumblue: "0000cd",
            mediumorchid: "ba55d3",
            mediumpurple: "9370db",
            mediumseagreen: "3cb371",
            mediumslateblue: "7b68ee",
            mediumspringgreen: "00fa9a",
            mediumturquoise: "48d1cc",
            mediumvioletred: "c71585",
            midnightblue: "191970",
            mintcream: "f5fffa",
            mistyrose: "ffe4e1",
            moccasin: "ffe4b5",
            navajowhite: "ffdead",
            navy: "000080",
            oldlace: "fdf5e6",
            olive: "808000",
            olivedrab: "6b8e23",
            orange: "ffa500",
            orangered: "ff4500",
            orchid: "da70d6",
            palegoldenrod: "eee8aa",
            palegreen: "98fb98",
            paleturquoise: "afeeee",
            palevioletred: "db7093",
            papayawhip: "ffefd5",
            peachpuff: "ffdab9",
            peru: "cd853f",
            pink: "ffc0cb",
            plum: "dda0dd",
            powderblue: "b0e0e6",
            purple: "800080",
            red: "f00",
            rosybrown: "bc8f8f",
            royalblue: "4169e1",
            saddlebrown: "8b4513",
            salmon: "fa8072",
            sandybrown: "f4a460",
            seagreen: "2e8b57",
            seashell: "fff5ee",
            sienna: "a0522d",
            silver: "c0c0c0",
            skyblue: "87ceeb",
            slateblue: "6a5acd",
            slategray: "708090",
            slategrey: "708090",
            snow: "fffafa",
            springgreen: "00ff7f",
            steelblue: "4682b4",
            tan: "d2b48c",
            teal: "008080",
            thistle: "d8bfd8",
            tomato: "ff6347",
            turquoise: "40e0d0",
            violet: "ee82ee",
            wheat: "f5deb3",
            white: "fff",
            whitesmoke: "f5f5f5",
            yellow: "ff0",
            yellowgreen: "9acd32"
        }, B = b.hexNames = j(A),
            C = function() {
                var a = "[-\\+]?\\d+%?",
                    b = "[-\\+]?\\d*\\.\\d+%?",
                    c = "(?:" + b + ")|(?:" + a + ")",
                    d = "[\\s|\\(]+(" + c + ")[,|\\s]+(" + c + ")[,|\\s]+(" + c + ")\\s*\\)?",
                    e = "[\\s|\\(]+(" + c + ")[,|\\s]+(" + c + ")[,|\\s]+(" + c + ")[,|\\s]+(" + c + ")\\s*\\)?";
                return {
                    rgb: new RegExp("rgb" + d),
                    rgba: new RegExp("rgba" + e),
                    hsl: new RegExp("hsl" + d),
                    hsla: new RegExp("hsla" + e),
                    hsv: new RegExp("hsv" + d),
                    hex3: /^([0-9a-fA-F]{1})([0-9a-fA-F]{1})([0-9a-fA-F]{1})$/,
                    hex6: /^([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})$/
                }
            }();
        a.tinycolor = b
    }(this), b(function() {
        b.fn.spectrum.load && b.fn.spectrum.processNativeColorInputs()
    })
}(window, jQuery),
function(a, b) {
    function c(a) {
        return function() {
            return this[a]
        }
    }

    function d(a, b) {
        var c = a.split("."),
            d = ea;
        !(c[0] in d) && d.execScript && d.execScript("var " + c[0]);
        for (var e; c.length && (e = c.shift());) c.length || b === aa ? d = d[e] ? d[e] : d[e] = {} : d[e] = b
    }

    function e(a) {
        return a.call.apply(a.bind, arguments)
    }

    function f(a, b) {
        if (!a) throw Error();
        if (2 < arguments.length) {
            var c = Array.prototype.slice.call(arguments, 2);
            return function() {
                var d = Array.prototype.slice.call(arguments);
                return Array.prototype.unshift.apply(d, c), a.apply(b, d)
            }
        }
        return function() {
            return a.apply(b, arguments)
        }
    }

    function g() {
        return g = Function.prototype.bind && -1 != Function.prototype.bind.toString().indexOf("native code") ? e : f, g.apply(ca, arguments)
    }

    function h(a, b) {
        this.G = a, this.u = b || a, this.z = this.u.document, this.R = aa
    }

    function i(a, c, d) {
        a = a.z.getElementsByTagName(c)[0], a || (a = b.documentElement), a && a.lastChild && a.insertBefore(d, a.lastChild)
    }

    function j(a, b) {
        return a.createElement("link", {
            rel: "stylesheet",
            href: b
        })
    }

    function k(a, b) {
        return a.createElement("script", {
            src: b
        })
    }

    function l(a, b) {
        for (var c = a.className.split(/\s+/), d = 0, e = c.length; e > d; d++)
            if (c[d] == b) return;
        c.push(b), a.className = c.join(" ").replace(/\s+/g, " ").replace(/^\s+|\s+$/, "")
    }

    function m(a, b) {
        for (var c = a.className.split(/\s+/), d = [], e = 0, f = c.length; f > e; e++) c[e] != b && d.push(c[e]);
        a.className = d.join(" ").replace(/\s+/g, " ").replace(/^\s+|\s+$/, "")
    }

    function n(a, b) {
        for (var c = a.className.split(/\s+/), d = 0, e = c.length; e > d; d++)
            if (c[d] == b) return ba;
        return da
    }

    function o(a) {
        if (a.R === aa) {
            var b = a.z.createElement("p");
            b.innerHTML = '<a style="top:1px;">w</a>', a.R = /top/.test(b.getElementsByTagName("a")[0].getAttribute("style"))
        }
        return a.R
    }

    function p(a) {
        var b = a.u.location.protocol;
        return "about:" == b && (b = a.G.location.protocol), "https:" == b ? "https:" : "http:"
    }

    function q(a, b, c) {
        this.w = a, this.T = b, this.Aa = c
    }

    function r(a, b, c, d) {
        this.e = a != ca ? a : ca, this.o = b != ca ? b : ca, this.ba = c != ca ? c : ca, this.f = d != ca ? d : ca
    }

    function s(a) {
        a = ga.exec(a);
        var b = ca,
            c = ca,
            d = ca,
            e = ca;
        return a && (a[1] !== ca && a[1] && (b = parseInt(a[1], 10)), a[2] !== ca && a[2] && (c = parseInt(a[2], 10)), a[3] !== ca && a[3] && (d = parseInt(a[3], 10)), a[4] !== ca && a[4] && (e = /^[0-9]+$/.test(a[4]) ? parseInt(a[4], 10) : a[4])), new r(b, c, d, e)
    }

    function t(a, b, c, d, e, f, g, h, i, j, k) {
        this.J = a, this.Ha = b, this.za = c, this.ga = d, this.Fa = e, this.fa = f, this.xa = g, this.Ga = h, this.wa = i, this.ea = j, this.k = k
    }

    function u(a, b) {
        this.a = a, this.H = b
    }

    function v(a) {
        var b = x(a.a, /(iPod|iPad|iPhone|Android|Windows Phone|BB\d{2}|BlackBerry)/, 1);
        return "" != b ? (/BB\d{2}/.test(b) && (b = "BlackBerry"), b) : (a = x(a.a, /(Linux|Mac_PowerPC|Macintosh|Windows|CrOS)/, 1), "" != a ? ("Mac_PowerPC" == a && (a = "Macintosh"), a) : "Unknown")
    }

    function w(a) {
        var b = x(a.a, /(OS X|Windows NT|Android) ([^;)]+)/, 2);
        if (b || (b = x(a.a, /Windows Phone( OS)? ([^;)]+)/, 2)) || (b = x(a.a, /(iPhone )?OS ([\d_]+)/, 2))) return b;
        if (b = x(a.a, /(?:Linux|CrOS) ([^;)]+)/, 1))
            for (var b = b.split(/\s/), c = 0; c < b.length; c += 1)
                if (/^[\d\._]+$/.test(b[c])) return b[c];
        return (a = x(a.a, /(BB\d{2}|BlackBerry).*?Version\/([^\s]*)/, 2)) ? a : "Unknown"
    }

    function x(a, b, c) {
        return (a = a.match(b)) && a[c] ? a[c] : ""
    }

    function y(a) {
        return a.documentMode ? a.documentMode : void 0
    }

    function z(a) {
        this.va = a || "-"
    }

    function A(a, b) {
        this.J = a, this.U = 4, this.K = "n";
        var c = (b || "n4").match(/^([nio])([1-9])$/i);
        c && (this.K = c[1], this.U = parseInt(c[2], 10))
    }

    function B(a) {
        return a.K + a.U
    }

    function C(a) {
        var b = 4,
            c = "n",
            d = ca;
        return a && ((d = a.match(/(normal|oblique|italic)/i)) && d[1] && (c = d[1].substr(0, 1).toLowerCase()), (d = a.match(/([1-9]00|normal|bold)/i)) && d[1] && (/bold/i.test(d[1]) ? b = 7 : /[1-9]00/.test(d[1]) && (b = parseInt(d[1].substr(0, 1), 10)))), c + b
    }

    function D(a, b, c) {
        this.c = a, this.h = b, this.M = c, this.j = "wf", this.g = new z("-")
    }

    function E(a) {
        l(a.h, a.g.f(a.j, "loading")), G(a, "loading")
    }

    function F(a) {
        m(a.h, a.g.f(a.j, "loading")), n(a.h, a.g.f(a.j, "active")) || l(a.h, a.g.f(a.j, "inactive")), G(a, "inactive")
    }

    function G(a, b, c) {
        a.M[b] && (c ? a.M[b](c.getName(), B(c)) : a.M[b]())
    }

    function H(a, b) {
        this.c = a, this.C = b, this.s = this.c.createElement("span", {
            "aria-hidden": "true"
        }, this.C)
    }

    function I(a, b) {
        var c, d = a.s;
        c = [];
        for (var e = b.J.split(/,\s*/), f = 0; f < e.length; f++) {
            var g = e[f].replace(/['"]/g, "");
            c.push(-1 == g.indexOf(" ") ? g : "'" + g + "'")
        }
        c = c.join(","), e = "normal", f = b.U + "00", "o" === b.K ? e = "oblique" : "i" === b.K && (e = "italic"), c = "position:absolute;top:-999px;left:-999px;font-size:300px;width:auto;height:auto;line-height:normal;margin:0;padding:0;font-variant:normal;white-space:nowrap;font-family:" + c + ";" + ("font-style:" + e + ";font-weight:" + f + ";"), o(a.c) ? d.setAttribute("style", c) : d.style.cssText = c
    }

    function J(a) {
        i(a.c, "body", a.s)
    }

    function K(a, b, c, d, e, f, g, h) {
        this.V = a, this.ta = b, this.c = c, this.q = d, this.C = h || "BESbswy", this.k = e, this.F = {}, this.S = f || 5e3, this.Z = g || ca, this.B = this.A = ca, a = new H(this.c, this.C), J(a);
        for (var i in ia) ia.hasOwnProperty(i) && (I(a, new A(ia[i], B(this.q))), this.F[ia[i]] = a.s.offsetWidth);
        a.remove()
    }

    function L(a, b, c) {
        for (var d in ia)
            if (ia.hasOwnProperty(d) && b === a.F[ia[d]] && c === a.F[ia[d]]) return ba;
        return da
    }

    function M(a) {
        var b = a.A.s.offsetWidth,
            c = a.B.s.offsetWidth;
        b === a.F.serif && c === a.F["sans-serif"] || a.k.T && L(a, b, c) ? fa() - a.ya >= a.S ? a.k.T && L(a, b, c) && (a.Z === ca || a.Z.hasOwnProperty(a.q.getName())) ? N(a, a.V) : N(a, a.ta) : setTimeout(g(function() {
            M(this)
        }, a), 25) : N(a, a.V)
    }

    function N(a, b) {
        a.A.remove(), a.B.remove(), b(a.q)
    }

    function O(a, b, c, d) {
        this.c = b, this.t = c, this.N = 0, this.ca = this.Y = da, this.S = d, this.k = a.k
    }

    function P(a, b, c, d, e) {
        if (0 === b.length && e) F(a.t);
        else
            for (a.N += b.length, e && (a.Y = e), e = 0; e < b.length; e++) {
                var f = b[e],
                    h = c[f.getName()],
                    i = a.t,
                    j = f;
                l(i.h, i.g.f(i.j, j.getName(), B(j).toString(), "loading")), G(i, "fontloading", j), new K(g(a.ha, a), g(a.ia, a), a.c, f, a.k, a.S, d, h).start()
            }
    }

    function Q(a) {
        0 == --a.N && a.Y && (a.ca ? (a = a.t, m(a.h, a.g.f(a.j, "loading")), m(a.h, a.g.f(a.j, "inactive")), l(a.h, a.g.f(a.j, "active")), G(a, "active")) : F(a.t))
    }

    function R(a, b, c) {
        this.G = a, this.W = b, this.a = c, this.O = this.P = 0
    }

    function S(a, b) {
        la.W.$[a] = b
    }

    function T(a, b) {
        this.c = a, this.d = b
    }

    function U(a, b) {
        this.c = a, this.d = b
    }

    function V(a) {
        var b = a.split(":");
        if (a = b[0], b[1]) {
            for (var c = b[1].split(","), b = [], d = 0, e = c.length; e > d; d++) {
                var f = c[d];
                if (f) {
                    var g = ma[f];
                    b.push(g ? g : f)
                }
            }
            for (c = [], d = 0; d < b.length; d += 1) c.push(new A(a, b[d]));
            return c
        }
        return [new A(a)]
    }

    function W(a, b, c) {
        this.a = a, this.c = b, this.d = c, this.m = []
    }

    function X(a, b) {
        this.c = a, this.d = b, this.m = []
    }

    function Y(a, b, c) {
        this.L = a ? a : b + na, this.p = [], this.Q = [], this.da = c || ""
    }

    function Z(a) {
        this.p = a, this.aa = [], this.I = {}
    }

    function $(a, b, c) {
        this.a = a, this.c = b, this.d = c
    }

    function _(a, b) {
        this.c = a, this.d = b, this.m = []
    }
    var aa = void 0,
        ba = !0,
        ca = null,
        da = !1,
        ea = this;
    ea.Ba = ba;
    var fa = Date.now || function() {
            return +new Date
        };
    h.prototype.createElement = function(a, b, c) {
        if (a = this.z.createElement(a), b)
            for (var d in b)
                if (b.hasOwnProperty(d))
                    if ("style" == d) {
                        var e = a,
                            f = b[d];
                        o(this) ? e.setAttribute("style", f) : e.style.cssText = f
                    } else a.setAttribute(d, b[d]);
        return c && a.appendChild(this.z.createTextNode(c)), a
    }, d("webfont.BrowserInfo", q), q.prototype.qa = c("w"), q.prototype.hasWebFontSupport = q.prototype.qa, q.prototype.ra = c("T"), q.prototype.hasWebKitFallbackBug = q.prototype.ra, q.prototype.sa = c("Aa"), q.prototype.hasWebKitMetricsBug = q.prototype.sa;
    var ga = /^([0-9]+)(?:[\._-]([0-9]+))?(?:[\._-]([0-9]+))?(?:[\._+-]?(.*))?$/;
    r.prototype.toString = function() {
        return [this.e, this.o || "", this.ba || "", this.f || ""].join("")
    }, d("webfont.UserAgent", t), t.prototype.getName = c("J"), t.prototype.getName = t.prototype.getName, t.prototype.pa = c("za"), t.prototype.getVersion = t.prototype.pa, t.prototype.la = c("ga"), t.prototype.getEngine = t.prototype.la, t.prototype.ma = c("fa"), t.prototype.getEngineVersion = t.prototype.ma, t.prototype.na = c("xa"), t.prototype.getPlatform = t.prototype.na, t.prototype.oa = c("wa"), t.prototype.getPlatformVersion = t.prototype.oa, t.prototype.ka = c("ea"), t.prototype.getDocumentMode = t.prototype.ka, t.prototype.ja = c("k"), t.prototype.getBrowserInfo = t.prototype.ja;
    var ha = new t("Unknown", new r, "Unknown", "Unknown", new r, "Unknown", "Unknown", new r, "Unknown", aa, new q(da, da, da));
    u.prototype.parse = function() {
        var a;
        if (-1 != this.a.indexOf("MSIE")) {
            a = v(this);
            var b = w(this),
                c = s(b),
                d = x(this.a, /MSIE ([\d\w\.]+)/, 1),
                e = s(d);
            a = new t("MSIE", e, d, "MSIE", e, d, a, c, b, y(this.H), new q("Windows" == a && 6 <= e.e || "Windows Phone" == a && 8 <= c.e, da, da))
        } else if (-1 != this.a.indexOf("Opera")) a: {
            a = "Unknown";
            var b = x(this.a, /Presto\/([\d\w\.]+)/, 1),
                c = s(b),
                d = w(this),
                e = s(d),
                f = y(this.H);

            if (c.e !== ca ? a = "Presto" : (-1 != this.a.indexOf("Gecko") && (a = "Gecko"), b = x(this.a, /rv:([^\)]+)/, 1), c = s(b)), -1 != this.a.indexOf("Opera Mini/")) {
                var g = x(this.a, /Opera Mini\/([\d\.]+)/, 1),
                    h = s(g);
                a = new t("OperaMini", h, g, a, c, b, v(this), e, d, f, new q(da, da, da))
            } else {
                if (-1 != this.a.indexOf("Version/") && (g = x(this.a, /Version\/([\d\.]+)/, 1), h = s(g), h.e !== ca)) {
                    a = new t("Opera", h, g, a, c, b, v(this), e, d, f, new q(10 <= h.e, da, da));
                    break a
                }
                g = x(this.a, /Opera[\/ ]([\d\.]+)/, 1), h = s(g), a = h.e !== ca ? new t("Opera", h, g, a, c, b, v(this), e, d, f, new q(10 <= h.e, da, da)) : new t("Opera", new r, "Unknown", a, c, b, v(this), e, d, f, new q(da, da, da))
            }
        } else if (/AppleWeb(K|k)it/.test(this.a)) {
            a = v(this);
            var b = w(this),
                c = s(b),
                d = x(this.a, /AppleWeb(?:K|k)it\/([\d\.\+]+)/, 1),
                e = s(d),
                f = "Unknown",
                g = new r,
                h = "Unknown",
                i = da; - 1 != this.a.indexOf("Chrome") || -1 != this.a.indexOf("CrMo") || -1 != this.a.indexOf("CriOS") ? f = "Chrome" : /Silk\/\d/.test(this.a) ? f = "Silk" : "BlackBerry" == a || "Android" == a ? f = "BuiltinBrowser" : -1 != this.a.indexOf("Safari") ? f = "Safari" : -1 != this.a.indexOf("AdobeAIR") && (f = "AdobeAIR"), "BuiltinBrowser" == f ? h = "Unknown" : "Silk" == f ? h = x(this.a, /Silk\/([\d\._]+)/, 1) : "Chrome" == f ? h = x(this.a, /(Chrome|CrMo|CriOS)\/([\d\.]+)/, 2) : -1 != this.a.indexOf("Version/") ? h = x(this.a, /Version\/([\d\.\w]+)/, 1) : "AdobeAIR" == f && (h = x(this.a, /AdobeAIR\/([\d\.]+)/, 1)), g = s(h), i = "AdobeAIR" == f ? 2 < g.e || 2 == g.e && 5 <= g.o : "BlackBerry" == a ? 10 <= c.e : "Android" == a ? 2 < c.e || 2 == c.e && 1 < c.o : 526 <= e.e || 525 <= e.e && 13 <= e.o, a = new t(f, g, h, "AppleWebKit", e, d, a, c, b, y(this.H), new q(i, 536 > e.e || 536 == e.e && 11 > e.o, "iPhone" == a || "iPad" == a || "iPod" == a || "Macintosh" == a))
        } else -1 != this.a.indexOf("Gecko") ? (a = "Unknown", b = new r, c = "Unknown", d = w(this), e = s(d), f = da, -1 != this.a.indexOf("Firefox") ? (a = "Firefox", c = x(this.a, /Firefox\/([\d\w\.]+)/, 1), b = s(c), f = 3 <= b.e && 5 <= b.o) : -1 != this.a.indexOf("Mozilla") && (a = "Mozilla"), g = x(this.a, /rv:([^\)]+)/, 1), h = s(g), f || (f = 1 < h.e || 1 == h.e && 9 < h.o || 1 == h.e && 9 == h.o && 2 <= h.ba || g.match(/1\.9\.1b[123]/) != ca || g.match(/1\.9\.1\.[\d\.]+/) != ca), a = new t(a, b, c, "Gecko", h, g, v(this), e, d, y(this.H), new q(f, da, da))) : a = ha;
        return a
    }, z.prototype.f = function() {
        for (var a = [], b = 0; b < arguments.length; b++) a.push(arguments[b].replace(/[\W_]+/g, "").toLowerCase());
        return a.join(this.va)
    }, A.prototype.getName = c("J"), H.prototype.remove = function() {
        var a = this.s;
        a.parentNode && a.parentNode.removeChild(a)
    };
    var ia = {
        Ea: "serif",
        Da: "sans-serif",
        Ca: "monospace"
    };
    K.prototype.start = function() {
        this.A = new H(this.c, this.C), J(this.A), this.B = new H(this.c, this.C), J(this.B), this.ya = fa(), I(this.A, new A(this.q.getName() + ",serif", B(this.q))), I(this.B, new A(this.q.getName() + ",sans-serif", B(this.q))), M(this)
    }, O.prototype.ha = function(a) {
        var b = this.t;
        m(b.h, b.g.f(b.j, a.getName(), B(a).toString(), "loading")), m(b.h, b.g.f(b.j, a.getName(), B(a).toString(), "inactive")), l(b.h, b.g.f(b.j, a.getName(), B(a).toString(), "active")), G(b, "fontactive", a), this.ca = ba, Q(this)
    }, O.prototype.ia = function(a) {
        var b = this.t;
        m(b.h, b.g.f(b.j, a.getName(), B(a).toString(), "loading")), n(b.h, b.g.f(b.j, a.getName(), B(a).toString(), "active")) || l(b.h, b.g.f(b.j, a.getName(), B(a).toString(), "inactive")), G(b, "fontinactive", a), Q(this)
    }, R.prototype.load = function(a) {
        var b = a.context || this.G;
        if (this.c = new h(this.G, b), b = new D(this.c, b.document.documentElement, a), this.a.k.w) {
            var c, d = this.W,
                e = this.c,
                f = [];
            for (c in a)
                if (a.hasOwnProperty(c)) {
                    var i = d.$[c];
                    i && f.push(i(a[c], e))
                }
            for (a = a.timeout, this.O = this.P = f.length, a = new O(this.a, this.c, b, a), c = 0, d = f.length; d > c; c++) e = f[c], e.v(this.a, g(this.ua, this, e, b, a))
        } else F(b)
    }, R.prototype.ua = function(a, b, c, d) {
        var e = this;
        d ? a.load(function(a, d, f) {
            var g = 0 == --e.P;
            g && E(b), setTimeout(function() {
                P(c, a, d || {}, f || ca, g)
            }, 0)
        }) : (a = 0 == --this.P, this.O--, a && (0 == this.O ? F(b) : E(b)), P(c, [], {}, ca, a))
    };
    var ja = a,
        ka = new u(navigator.userAgent, b).parse(),
        la = ja.WebFont = new R(a, new function() {
            this.$ = {}
        }, ka);
    la.load = la.load, T.prototype.load = function(a) {
        var b, c, d = this.d.urls || [],
            e = this.d.families || [];
        for (b = 0, c = d.length; c > b; b++) i(this.c, "head", j(this.c, d[b]));
        for (d = [], b = 0, c = e.length; c > b; b++) {
            var f = e[b].split(":");
            if (f[1])
                for (var g = f[1].split(","), h = 0; h < g.length; h += 1) d.push(new A(f[0], g[h]));
            else d.push(new A(f[0]))
        }
        a(d)
    }, T.prototype.v = function(a, b) {
        return b(a.k.w)
    }, S("custom", function(a, b) {
        return new T(b, a)
    });
    var ma = {
        regular: "n4",
        bold: "n7",
        italic: "i4",
        bolditalic: "i7",
        r: "n4",
        b: "n7",
        i: "i4",
        bi: "i7"
    };
    U.prototype.v = function(a, b) {
        return b(a.k.w)
    }, U.prototype.load = function(a) {
        i(this.c, "head", j(this.c, p(this.c) + "//webfonts.fontslive.com/css/" + this.d.key + ".css"));
        for (var b = this.d.families, c = [], d = 0, e = b.length; e > d; d++) c.push.apply(c, V(b[d]));
        a(c)
    }, S("ascender", function(a, b) {
        return new U(b, a)
    }), W.prototype.v = function(a, b) {
        var c = this,
            d = c.d.projectId,
            e = c.d.version;
        if (d) {
            var f = c.c.u,
                g = c.c.createElement("script");
            g.id = "__MonotypeAPIScript__" + d;
            var h = da;
            g.onload = g.onreadystatechange = function() {
                if (!(h || this.readyState && "loaded" !== this.readyState && "complete" !== this.readyState)) {
                    if (h = ba, f["__mti_fntLst" + d]) {
                        var e = f["__mti_fntLst" + d]();
                        if (e)
                            for (var i = 0; i < e.length; i++) c.m.push(new A(e[i].fontfamily))
                    }
                    b(a.k.w), g.onload = g.onreadystatechange = ca
                }
            }, g.src = c.D(d, e), i(this.c, "head", g)
        } else b(ba)
    }, W.prototype.D = function(a, b) {
        var c = p(this.c),
            d = (this.d.api || "fast.fonts.com/jsapi").replace(/^.*http(s?):(\/\/)?/, "");
        return c + "//" + d + "/" + a + ".js" + (b ? "?v=" + b : "")
    }, W.prototype.load = function(a) {
        a(this.m)
    }, S("monotype", function(a, c) {
        var d = new u(navigator.userAgent, b).parse();
        return new W(d, c, a)
    }), X.prototype.D = function(a) {
        var b = p(this.c);
        return (this.d.api || b + "//use.typekit.net") + "/" + a + ".js"
    }, X.prototype.v = function(a, b) {
        var c = this.d.id,
            d = this.d,
            e = this.c.u,
            f = this;
        c ? (e.__webfonttypekitmodule__ || (e.__webfonttypekitmodule__ = {}), e.__webfonttypekitmodule__[c] = function(c) {
            c(a, d, function(a, c, d) {
                for (var e = 0; e < c.length; e += 1) {
                    var g = d[c[e]];
                    if (g)
                        for (var h = 0; h < g.length; h += 1) f.m.push(new A(c[e], g[h]));
                    else f.m.push(new A(c[e]))
                }
                b(a)
            })
        }, c = k(this.c, this.D(c)), i(this.c, "head", c)) : b(ba)
    }, X.prototype.load = function(a) {
        a(this.m)
    }, S("typekit", function(a, b) {
        return new X(b, a)
    });
    var na = "//fonts.googleapis.com/css";
    Y.prototype.f = function() {
        if (0 == this.p.length) throw Error("No fonts to load !");
        if (-1 != this.L.indexOf("kit=")) return this.L;
        for (var a = this.p.length, b = [], c = 0; a > c; c++) b.push(this.p[c].replace(/ /g, "+"));
        return a = this.L + "?family=" + b.join("%7C"), 0 < this.Q.length && (a += "&subset=" + this.Q.join(",")), 0 < this.da.length && (a += "&text=" + encodeURIComponent(this.da)), a
    };
    var oa = {
        latin: "BESbswy",
        cyrillic: "&#1081;&#1103;&#1046;",
        greek: "&#945;&#946;&#931;",
        khmer: "&#x1780;&#x1781;&#x1782;",
        Hanuman: "&#x1780;&#x1781;&#x1782;"
    }, pa = {
            thin: "1",
            extralight: "2",
            "extra-light": "2",
            ultralight: "2",
            "ultra-light": "2",
            light: "3",
            regular: "4",
            book: "4",
            medium: "5",
            "semi-bold": "6",
            semibold: "6",
            "demi-bold": "6",
            demibold: "6",
            bold: "7",
            "extra-bold": "8",
            extrabold: "8",
            "ultra-bold": "8",
            ultrabold: "8",
            black: "9",
            heavy: "9",
            l: "3",
            r: "4",
            b: "7"
        }, qa = {
            i: "i",
            italic: "i",
            n: "n",
            normal: "n"
        }, ra = RegExp("^(thin|(?:(?:extra|ultra)-?)?light|regular|book|medium|(?:(?:semi|demi|extra|ultra)-?)?bold|black|heavy|l|r|b|[1-9]00)?(n|i|normal|italic)?$");
    Z.prototype.parse = function() {
        for (var a = this.p.length, b = 0; a > b; b++) {
            var c = this.p[b].split(":"),
                d = c[0].replace(/\+/g, " "),
                e = ["n4"];
            if (2 <= c.length) {
                var f, g = c[1];
                if (f = [], g)
                    for (var g = g.split(","), h = g.length, i = 0; h > i; i++) {
                        var j;
                        if (j = g[i], j.match(/^[\w]+$/)) {
                            j = ra.exec(j.toLowerCase());
                            var k = aa;
                            if (j == ca) k = "";
                            else {
                                if (k = aa, k = j[1], k == ca || "" == k) k = "4";
                                else var l = pa[k],
                                k = l ? l : isNaN(k) ? "4" : k.substr(0, 1);
                                k = [j[2] == ca || "" == j[2] ? "n" : qa[j[2]], k].join("")
                            }
                            j = k
                        } else j = "";
                        j && f.push(j)
                    }
                0 < f.length && (e = f), 3 == c.length && (c = c[2], f = [], c = c ? c.split(",") : f, 0 < c.length && (c = oa[c[0]]) && (this.I[d] = c))
            }
            for (this.I[d] || (c = oa[d]) && (this.I[d] = c), c = 0; c < e.length; c += 1) this.aa.push(new A(d, e[c]))
        }
    };
    var sa = {
        Arimo: ba,
        Cousine: ba,
        Tinos: ba
    };
    $.prototype.v = function(a, b) {
        b(a.k.w)
    }, $.prototype.load = function(a) {
        var b = this.c;
        if ("MSIE" == this.a.getName() && this.d.blocking != ba) {
            var c = g(this.X, this, a),
                d = function() {
                    b.z.body ? c() : setTimeout(d, 0)
                };
            d()
        } else this.X(a)
    }, $.prototype.X = function(a) {
        for (var b = this.c, c = new Y(this.d.api, p(b), this.d.text), d = this.d.families, e = d.length, f = 0; e > f; f++) {
            var g = d[f].split(":");
            3 == g.length && c.Q.push(g.pop());
            var h = "";
            2 == g.length && "" != g[1] && (h = ":"), c.p.push(g.join(h))
        }
        d = new Z(d), d.parse(), i(b, "head", j(b, c.f())), a(d.aa, d.I, sa)
    }, S("google", function(a, c) {
        var d = new u(navigator.userAgent, b).parse();
        return new $(d, c, a)
    }), _.prototype.D = function(a) {
        return p(this.c) + (this.d.api || "//f.fontdeck.com/s/css/js/") + (this.c.u.location.hostname || this.c.G.location.hostname) + "/" + a + ".js"
    }, _.prototype.v = function(a, b) {
        var c = this.d.id,
            d = this.c.u,
            e = this;
        c ? (d.__webfontfontdeckmodule__ || (d.__webfontfontdeckmodule__ = {}), d.__webfontfontdeckmodule__[c] = function(a, c) {
            for (var d = 0, f = c.fonts.length; f > d; ++d) {
                var g = c.fonts[d];
                e.m.push(new A(g.name, C("font-weight:" + g.weight + ";font-style:" + g.style)))
            }
            b(a)
        }, c = k(this.c, this.D(c)), i(this.c, "head", c)) : b(ba)
    }, _.prototype.load = function(a) {
        a(this.m)
    }, S("fontdeck", function(a, b) {
        return new _(b, a)
    }), a.WebFontConfig && la.load(a.WebFontConfig)
}(this, document);
var fancyProductDesignerFilterImg = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAIAAAD/gAIDAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA1ZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0iQzA2NTAzMzhGRDBGRjNDNTQ2NjQ5MTdERjU4RTZBOUYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NDJBOTU5NjZBQTVFMTFFNDg3MTc5QzUzNEZBREI5NjIiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NDJBOTU5NjVBQTVFMTFFNDg3MTc5QzUzNEZBREI5NjIiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDozNDlGNUFEOERDNDhFNDExOThFMDgyRUM1NERENjU5QSIgc3RSZWY6ZG9jdW1lbnRJRD0iQzA2NTAzMzhGRDBGRjNDNTQ2NjQ5MTdERjU4RTZBOUYiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4g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";

fabric.Canvas.prototype.cursorMap = ["default", "default", "default", "se-resize", "default", "default", "default", "default"];
var rotateIcon = new Image,
    resizeIcon = new Image,
    removeIcon = new Image,
    copyIcon = new Image;
rotateIcon.src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAACXBIWXMAAAsTAAALEwEAmpwYAAABWWlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS40LjAiPgogICA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogICAgICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgICAgICAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyI+CiAgICAgICAgIDx0aWZmOk9yaWVudGF0aW9uPjE8L3RpZmY6T3JpZW50YXRpb24+CiAgICAgIDwvcmRmOkRlc2NyaXB0aW9uPgogICA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgpMwidZAAAC/0lEQVQ4EYWVu0tkUQyHc8cnVmI3inYitoKlpdjaWQ3iP7AIFrtoLwx2i42NaKWCjZVoY2PnaOcDUfE1F0FQ1MLnvdl8mTmXcZZlA2dy7knyS06Sk4nEaGtr60d3d/ev1tbWvFYo4vx/FEWR2ore3t7im5ub4sjIyG8He35+ruJowiZNU1/ZYZJ8+66Tu83Ly4sSWHR0dFTu7+/v/DIyxUYD8cDMsYR9U1OTJEniK5fLuRwZERpFDQ0NX41Gx8fHcc6u2WkaqRk0mrJiEIzgAJmi8+bmZneCM2RwA1NswQArhwv7yAVvuOeIRWRtbW2ysrIi6+vrDsBZxQRNIUQzjRzD9goghy7lhz2eW1paxHIrpVLJIywUCrKxsSGfn58uJ/JgFzDgcnZ25gl/f39X1sfHB1fQvb09HR4expP29vY6Z7+7u2t2qpZy18XGquwYYFUyXI3MmFhuxYxkcHBQDEgODg5kbGwMkczOzkpfX59Y8eTp6cl5yLcr8BMifH19dc/X19cezczMjIazyclJnZ6eVloDOj091fHxced8Bz2wMkDChpaWlhwQYAiQnZ0dfXh48GuRjqurK9cpFotZuuhNACm3E6GTcK44NTUl+Xzev6nq0NCQ61h+vV26urpkc3NTLAixXHqRqjCSAYYDQNvb213JAnROztjjFM7CCWAQ34GyonBAuwB2e3vr0dUCIAOYM4Dm5+dlcXHRbZBlVF+U7e1tz8/+/r45Vm+l0FIhzycnJ66zurrqOrVtU1sUnp9aO+jExERqHtWenBvQc8gsHV6ku7s7XVtb0/v7+xSFb1U+Pz/3Q4siDZ4uLy91dHTUo5ibm9M4jjFWqjowMKCHh4fuKERuxXIMsOTi4gJhgpBXAocAWF5ezq5PtES9sLCg5XLZX0qdTQIW4yu28ZW3a9WOL7XJ4m/88fFRmDIknjbp6OjwvYFRIJxExn18WW7jfw5Yckaz1hNnyGro+4Cl3Ezanp6enzZhOquKFlBlwNIq7FmhbYLM+F9/AX8AdQud0FqHQBoAAAAASUVORK5CYII=", resizeIcon.src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAACXBIWXMAAAsTAAALEwEAmpwYAAABWWlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS40LjAiPgogICA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogICAgICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgICAgICAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyI+CiAgICAgICAgIDx0aWZmOk9yaWVudGF0aW9uPjE8L3RpZmY6T3JpZW50YXRpb24+CiAgICAgIDwvcmRmOkRlc2NyaXB0aW9uPgogICA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgpMwidZAAAC6UlEQVQ4EYVUv0tjQRCefb5ECRoIpDEYDUkjSoqU6QUr/QvExs5Cy7s61Vme/4CFoDYBKyFtGiWQiCBKQLSQJKX4kxiTt/d9Q/Zx8TgysG93Z2a/+fnGCKhSqeyk0+mfU1NTs0EQWLAM+ePIGGOxTLfbbT8+Pu6trq7uK9jLy4sd0oA7QbkcubvjuftQrm9eX18tHTO3t7etxcXF1NfXV9/zPB9LoCgwrDv46qi78+LO2IlpJiYm+j4IWG1/cnIyBZ2AYBcXF7bRaJjp6Wnp9/vy9vYmKysrsry8LIPBIAR2oNzxzkJGvAApS/l0n3xYsfV63ezu7lJP6fj4WBYWFhTMee1kw50u0mPFoLseBMqkYGZmJtQvFouSz+clHo+HvP8d8NZhGAI6MgyTVCgU5Pz8XLa3t+Xy8pJhKZ9Gx5FquiSjUnJ0dCQHBwcKWq1WZXNzUzqdjkQiES3SOEC5u7uDYWvRS/bq6so+Pz/rvVar2VQqZWHAfnx8WFTbfn5+hqvX61m3yGctiGX4yWazAqGgUgKBOsEwW62WJJNJicVigkfaLuTD4khr8R6NRuX+/l7CHDJsgjlltsn8/LwqEoxANEg5z04f3RHmmJ6EgA6IilwkAtEI7wR5f3+Xw8NDQTo0p8wrexUpCd+EgARwQO5MEBJ3GiyXy7K1tSXr6+tyfX2tQOzVp6cn1WNUvp7GfOglQ1taWtJ1c3MjpVJJcrmcnJ2dqYEQgkXBA1YvcFXD/vdZK0sZCf+r3djYYENyBfDWttttlTWbTeshTI6g0MDwMMKgnF5yYcxJJpNx+oaVBWnHE8vHh485qwjuFEd2yLTCbPyTkxM5PT3VMB8eHvQHcBjIteejoTt4PcsRxKlBJCgwBNUjGIne0SCGqKytrbkCqlIikeA/6yMtbR+T9tfc3NxvDAYdQRB4BCPId+Kg+DYsNDro+fSeU1sfctKiiX9wNtI10D+A9A7873PRIkpDz0B7mJ37fwDDzTkRRcDc5gAAAABJRU5ErkJggg==", removeIcon.src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAACXBIWXMAAAsTAAALEwEAmpwYAAABWWlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS40LjAiPgogICA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogICAgICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgICAgICAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyI+CiAgICAgICAgIDx0aWZmOk9yaWVudGF0aW9uPjE8L3RpZmY6T3JpZW50YXRpb24+CiAgICAgIDwvcmRmOkRlc2NyaXB0aW9uPgogICA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgpMwidZAAACw0lEQVQ4EYWVPU9qQRCG9xwOQrCWRBNIoKOhobSh0t9BbwBNyCUE+mt7fwQtUNoQNRb+AiVRG8jlq+RDEPHsfd8Je3L4SO4kG93d2WfenTM7WAp2d3eXj8Vi5XA4fOq6rsaSxfX/mWVZGsNaLpf9Xq93e3l5+Udgk8lE0wD7gWkOgjdr8j/nZpj1jd8P59PpVFOY9fLy8jeVSp19f3+vocgJBoMKjgpzZdu2gu+WUAhSAMve0dERg1uYr3HOeX197du45hkOuYQx4sPDgxoMBgrrAiPUPxgAIAny+PhIXx0IBBwyyFIfHx+8J+bavb+/pxx9dXWlx+Mx1/RisdCr1UoGcqXX67WkpNVqiW+5XNbz+Vzy8/b25qr393dxANRFYgVGaLFY1KPRSKAEGRiBzWZTYPRrt9sSjI5kCZDJphIalRFG5+vraw+KnIo6P+zp6UnO8AZkbAGNCnpQmYHm83nv+o1Gw1Pmhxkxe0BGMpuEEkal1WpV1+v1g7Cvry/NcVAhgdykWhqvX6vVPFA6ndbPz8+yR1/6mb8GaEPBlrHOaEi+Ojk5UahRbz+TyahEIuHts5z2jPcm3R+NX5LD5IzKcrmcKC0UCno4HIpKU1I8axR6X9lc1cBMnUGBXJM5JYxz/9cn7CCQ0VjgBB4qDUqiMsII3a3TPYVIrkuVG2V8itpfGp+fn3JNf0nd3Ny4fHoUQTFSNoee3i7M5NdfUoCJ0kqlsvX0HPYzGN+znUwmFd6muri4UOfn59JxcBVpDgii0AQUbqGi0agqlUrSQLLZrEKnYWm42LfZvvoojVPIXqMMHKhgN2F0C0EOtjDCHcchXBMGkJztdDp9Gw3hN5ojHajWPT4+log8wBbG/sh2tTvgqyKRiIV9l0Jms5nqdru3UsXstPF4/FcoFDpjcpkD2F5zpTK/8StBnQWlfcL4E/AP1Ru/hjA7dpIAAAAASUVORK5CYII=", copyIcon.src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2ZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDowMTgwMTE3NDA3MjA2ODExOEE2RDlFMzNBNzM3REJDNyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDowNUE4NkE1QkY4OUYxMUU0QjE0NEVCN0VBQjE0QUYyMCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDowNUE4NkE1QUY4OUYxMUU0QjE0NEVCN0VBQjE0QUYyMCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IE1hY2ludG9zaCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjAxODAxMTc0MDcyMDY4MTE4QTZEQUI2OTEzMjkzN0EwIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjAxODAxMTc0MDcyMDY4MTE4QTZEOUUzM0E3MzdEQkM3Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+x3L2tAAABFxJREFUeNrsmUtIW1kYx788fD9QY0DtYihFJLsp4qtQEEEsKtQqo4giqODCuhmEURA3LmVKu3FjFypofaCoNGiFAVEYwY0LQZ2OdGEVJTUj0aDGqHG+/yFXot68vEl00Q8OJveenPs73/tcVWtrayQnV1dXGJH8UUPBlzOVSnXB484NrQxYFP95HRYWlsfjKf8oApeDCKdyOBwWu93+78XFxV/8vAVX0BuAPLE0JiamW6/XGyIiIkij0ZDcrgItsBbDkdVq/cNsNs/y52Z+7u4NQIZ7lZSU9CklJSVOrVZTKAVKCA8PJ51OFx4bG/t6e3tbb7PZ3jDHD7VkVtbcu9TU1JDD3RZYLi0t7QVb7y2+S4BFycnJhlCY0xeJjo6m+Pj4FraqTg37czC8jIqKehx0TmGLJrHCnmsByOrUKVnMZDIROzddXl7eCSqsj2vsPsRW8nlNrVZL7G5PpCBRlEZaW1tpdnZWQADodgBwdArfGhoaoqysLH+WDtMGwhzQXkdHBzU0NMgCzs/PU01NDVVVVdHo6Kg/kFcBAUSKYB+mhIQEt+YqKiqiwsJCKi8vp7GxMcrLy/PN1B7rz9kZra+v0/HxsdsEGxkZSe3t7SKpuxP4Juc1am5uRr6liooKmpqaouzsbGWAW1tbVFpaKnwLWrhtPsje3h6VlJRQT0+PTxppaWkR/lhbW0uDg4NeIT0CYtfISdgtVxmxe1ffgjQ2NlJfXx8dHh5Sf3+/MLecpnd3d2lhYUFsNCcnh3Jzc6m4uJjm5uYoMzPzfoCAwG45aQpQd3O6u7tpcXGRqqurRaTC7K7ClUGs09nZKb6jWmEOrnV1ddH09PT9AKXdw4fcyfn5OSUmJtLAwIDwLUTryMgIkv/1HEQtIlmygLM4iM0MDw97fH5ACi8eyJmfjEaj2ExdXZ0IsOuHsMZwPy4uTgxYBFEPq3ir/YoB0SatrKzQ0tISLS8vU1NTk9BWfX09nZycePytJ8v4bGJvAgcfHx8XPgh/hOnS09NpcnKSKisrqaysTNH6igGRA1HqpICBuWE2pCeLxaLYfRQDQmOuASEJEncgesugdadySf1RAQZKfgL+BAz2CS7oacZTo4GxurpKm5ubd84qgEN341oSQw6IPDgzMyNqNNosuTkFBQUPA4jOBbW2ra1NVBp3Z25vydwrIBZAB+J3iXJ24FJ9Dkqpw+LohHt7e/2G3NjYCMiLJwlQdiW0+fn5+TQxMeFXXYV5DQYDZWRkKK6YWmcHcip3F6064B5CsEnmOlIDkNv2r2g8H5Nw+mFGx7raSfuFT2X/PRY4aO/o6GielfdV7QyGfw4ODj66O6CHWsxms+P09PQDc11KgKD+c2dn5zOTB6yXu8/5xmQynezv77dxUBoFm+tbfudb/d84pfzOp65f+RCuCsVLTSR0u91+ZrVajTab7T3D/X2d6uT+DcHaxCn9F574DF09BfctP16iWnh8Y2V853HjWf8LMAB0YMuB3kGOawAAAABJRU5ErkJggg==", fabric.Object.prototype._drawControl = function(a, b, c, d, e) {
    var f = this.cornerSize;
    if (this.isControlVisible(a)) {
        var g = !1;
        if ("tr" == a || "br" == a || "mtr" == a || "tl" == a) switch (a) {
            case "tr":
                g = this.params.removable ? removeIcon : !1;
                break;
            case "br":
                g = this.params.resizable ? resizeIcon : !1;
                break;
            case "mtr":
                g = this.params.rotatable ? rotateIcon : !1;
                break;
            case "tl":
                g = this.params.isInitial === !0 || this.params.hasUploadZone ? !1 : copyIcon
        }
        this.transparentCorners || b.clearRect(d, e, f, f), g !== !1 && (b.drawImage(g, d, e, f, f), b[c](d, e, f, f))
    }
}, fabric.Object.prototype.findTargetCorner = function(a) {
    if (!this.hasControls || !this.active) return !1;
    var b, c, d = a.x,
        e = a.y;
    for (var f in this.oCoords)
        if (this.isControlVisible(f) && ("mtr" !== f || this.hasRotatingPoint) && (!this.get("lockUniScaling") || "mt" !== f && "mr" !== f && "mb" !== f && "ml" !== f) && (c = this._getImageLines(this.oCoords[f].corner), b = this._findCrossPoints({
            x: d,
            y: e
        }, c), 0 !== b && b % 2 === 1)) return this.__corner = f, f;
    return !1
}, fabric.IText.prototype.initHiddenTextarea = function() {
    this.hiddenTextarea = fabric.document.createElement("textarea"), this.hiddenTextarea.setAttribute("autocapitalize", "off"), this.hiddenTextarea.style.cssText = "position: absolute; top: 0; left: -100px; opacity: 0; width: 0; height: 0; z-index: -99999;", this.canvas.wrapperEl.appendChild(this.hiddenTextarea), fabric.util.addListener(this.hiddenTextarea, "keydown", this.onKeyDown.bind(this)), fabric.util.addListener(this.hiddenTextarea, "keypress", this.onKeyPress.bind(this)), fabric.util.addListener(this.hiddenTextarea, "copy", this.copy.bind(this)), fabric.util.addListener(this.hiddenTextarea, "paste", this.paste.bind(this)), !this._clickHandlerInitialized && this.canvas && (fabric.util.addListener(this.canvas.upperCanvasEl, "click", this.onClick.bind(this)), this._clickHandlerInitialized = !0)
};
var FancyProductDesigner = function(a, b) {
    function c() {
        var a = navigator.userAgent.toLowerCase();
        return -1 != a.indexOf("msie") ? parseInt(a.split("msie")[1]) : !1
    }
    $ = jQuery;
    var d = $.extend({}, $.fn.fancyProductDesigner.defaults, b);
    d.elementParameters = $.extend({}, $.fn.fancyProductDesigner.defaults.elementParameters, d.elementParameters), d.textParameters = $.extend({}, $.fn.fancyProductDesigner.defaults.textParameters, d.textParameters), d.imageParameters = $.extend({}, $.fn.fancyProductDesigner.defaults.imageParameters, d.imageParameters), d.customTextParameters = $.extend({}, $.fn.fancyProductDesigner.defaults.customTextParameters, d.customTextParameters), d.customImageParameters = $.extend({}, $.fn.fancyProductDesigner.defaults.customImageParameters, d.customImageParameters), d.customAdds = $.extend({}, $.fn.fancyProductDesigner.defaults.customAdds, d.customAdds), d.dimensions = $.extend({}, $.fn.fancyProductDesigner.defaults.dimensions, d.dimensions), d.labels = $.extend({}, $.fn.fancyProductDesigner.defaults.labels, d.labels);
    var e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w = "3.0.31",
        x = this,
        y = $(window),
        z = $("body"),
        A = null,
        B = [],
        C = null,
        D = {}, E = null,
        F = null,
        G = 0,
        H = -1,
        I = 0,
        J = null,
        K = null,
        L = 0,
        M = 1,
        N = {}, O = !1,
        P = !1,
        Q = new fabric.Point(0, 0),
        R = [],
        S = [],
        T = [],
        U = !1,
        V = null,
        W = !1,
        X = !0,
        Y = null;
    g = $(a).width(d.width).addClass("fpd-container fpd-clearfix").before('<p class="fpd-initiliazing">' + d.labels.initText + '<br /><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMiAzMiIgd2lkdGg9IjMyIiBoZWlnaHQ9IjMyIiBmaWxsPSJibGFjayI+CiAgPGNpcmNsZSB0cmFuc2Zvcm09InRyYW5zbGF0ZSg4IDApIiBjeD0iMCIgY3k9IjE2IiByPSIwIj4KICAgIDxhbmltYXRlIGF0dHJpYnV0ZU5hbWU9InIiIHZhbHVlcz0iMDsgNDsgMDsgMCIgZHVyPSIxLjJzIiByZXBlYXRDb3VudD0iaW5kZWZpbml0ZSIgYmVnaW49IjAiCiAgICAgIGtleXRpbWVzPSIwOzAuMjswLjc7MSIga2V5U3BsaW5lcz0iMC4yIDAuMiAwLjQgMC44OzAuMiAwLjYgMC40IDAuODswLjIgMC42IDAuNCAwLjgiIGNhbGNNb2RlPSJzcGxpbmUiIC8+CiAgPC9jaXJjbGU+CiAgPGNpcmNsZSB0cmFuc2Zvcm09InRyYW5zbGF0ZSgxNiAwKSIgY3g9IjAiIGN5PSIxNiIgcj0iMCI+CiAgICA8YW5pbWF0ZSBhdHRyaWJ1dGVOYW1lPSJyIiB2YWx1ZXM9IjA7IDQ7IDA7IDAiIGR1cj0iMS4ycyIgcmVwZWF0Q291bnQ9ImluZGVmaW5pdGUiIGJlZ2luPSIwLjMiCiAgICAgIGtleXRpbWVzPSIwOzAuMjswLjc7MSIga2V5U3BsaW5lcz0iMC4yIDAuMiAwLjQgMC44OzAuMiAwLjYgMC40IDAuODswLjIgMC42IDAuNCAwLjgiIGNhbGNNb2RlPSJzcGxpbmUiIC8+CiAgPC9jaXJjbGU+CiAgPGNpcmNsZSB0cmFuc2Zvcm09InRyYW5zbGF0ZSgyNCAwKSIgY3g9IjAiIGN5PSIxNiIgcj0iMCI+CiAgICA8YW5pbWF0ZSBhdHRyaWJ1dGVOYW1lPSJyIiB2YWx1ZXM9IjA7IDQ7IDA7IDAiIGR1cj0iMS4ycyIgcmVwZWF0Q291bnQ9ImluZGVmaW5pdGUiIGJlZ2luPSIwLjYiCiAgICAgIGtleXRpbWVzPSIwOzAuMjswLjc7MSIga2V5U3BsaW5lcz0iMC4yIDAuMiAwLjQgMC44OzAuMiAwLjYgMC40IDAuODswLjIgMC42IDAuNCAwLjgiIGNhbGNNb2RlPSJzcGxpbmUiIC8+CiAgPC9jaXJjbGU+Cjwvc3ZnPg==" /></p>'), h = g.prev(".fpd-initiliazing"), e = g.children(".fpd-category").size() > 0 ? g.children(".fpd-category").remove() : g.children(".fpd-product").remove(), f = g.children(".fpd-design");
    var Z = document.createElement("canvas"),
        _ = Boolean(Z.getContext && Z.getContext("2d"));
    if (!_ || c() && Number(c()) <= 9) return $.post(d.templatesDirectory + "canvaserror.php", function(a) {
        g.append($.parseHTML(a)).fadeIn(300), g.trigger("templateLoad", [this.url])
    }), h.remove(), g.trigger("canvasFail"), !1;
    try {
        window.localStorage.length, window.localStorage.setItem("fpd-version", w)
    } catch (aa) {
        X = !1
    }
    for (var ba, ca = Object.keys(d.hexNames), da = ca.length, ea = {}; da--;) ba = ca[da], ea[ba.toLowerCase()] = d.hexNames[ba];
    d.hexNames = ea, $.post(d.templatesDirectory + "productdesigner.php", d.labels, function(a) {
        g.append($.parseHTML(a)), q = g.children(".fpd-full-loader").hide(), i = g.children(".fpd-main-container"), j = i.children(".fpd-product-stage").height(d.stageHeight), n = j.children(".fpd-element-tooltip").html(d.labels.outOfContainmentAlert), i.children(".fpd-context-dialog").remove().clone().appendTo(z), k = z.children(".fpd-context-dialog").addClass("fpd-hidden"), l = k.find(".fpd-context-loader"), m = k.find(".fpd-color-picker"), g.trigger("templateLoad", [this.url]), setTimeout(fa, 1e3)
    });
    var fa = function() {
        if (g.find("[data-context]").on("mouseup touchend", function() {
            var a = $(this);
            x.callDialogContent(a.data("context"), a.children("span").text())
        }), d.imageDownloadable && g.find(".fpd-download-image").on("mouseup touchend", function() {
            var a = document.createElement("a");
            "undefined" != typeof a.download ? g.find(".fpd-download-anchor").attr("href", x.getProductDataURL()).attr("download", "Product.png")[0].click() : x.createImage(!0, !0)
        }).css("display", "block"), d.saveAsPdf && window.jsPDF && g.find(".fpd-save-pdf").on("mouseup touchend", function(a) {
            a.preventDefault(), x.deselectElement();
            for (var b = r.getWidth() > r.getHeight() ? "l" : "p", c = new jsPDF(b, "mm", [.26 * d.width, .26 * d.stageHeight]), e = x.getViewsDataURL("jpeg", "white"), f = 0; f < e.length; ++f) c.addImage(e[f], "JPEG", 0, 0), f < e.length - 1 && c.addPage();
            c.save("Product.pdf")
        }).css("display", "block"), d.printable && g.find(".fpd-print").on("mouseup touchend", function(a) {
            a.preventDefault(), x.print()
        }).css("display", "block"), X && d.allowProductSaving && g.attr("id")) {
            g.find(".fpd-save-product, .fpd-load-saved-products").css("display", "block"), g.find(".fpd-save-product").on("mouseup touchend", function(a) {
                a.preventDefault(), x.deselectElement();
                var b = x.getProduct(!1);
                thumbnail = x.getViewsDataURL("png", "transparent", .2)[0];
                var c = pa();
                null == c && (c = new Array), c.push({
                    thumbnail: thumbnail,
                    product: b
                }), window.localStorage.setItem(g.attr("id"), JSON.stringify(c)), sa(thumbnail, b), x.showMessage(d.labels.productSaved)
            }), g.find(".fpd-load-saved-products").on("mouseup touchend", function(a) {
                a.preventDefault(), x.callDialogContent("saved-products", $(this).text())
            });
            var a = pa();
            if (null != a)
                for (var b = 0; b < a.length; ++b) {
                    var c = a[b];
                    sa(c.thumbnail, c.product)
                }
        }
        g.find(".fpd-more").on("click", function() {
            $(this).children(".fpd-dropdown-menu").addClass("fpd-do-trans")
        }).mouseleave(function() {
            $(this).children(".fpd-dropdown-menu").removeClass("fpd-do-trans")
        }), $(document).on("touchend", function() {
            g.find(".fpd-more").mouseleave()
        }), g.find(".fpd-undo, .fpd-redo").click(function() {
            if ($(this).hasClass("fpd-undo")) {
                var a = jQuery.extend({}, K.params);
                T.push({
                    element: K,
                    parameters: a
                });
                var b = S.pop();
                void 0 !== b && void 0 !== b.element && x.setElementParameters(b.element, b.parameters), S.pop()
            } else {
                var b = T.pop();
                void 0 !== b && void 0 !== b.element && x.setElementParameters(b.element, b.parameters)
            }
            g.find(".fpd-redo").toggleClass("fpd-disabled", 0 == T.length)
        }), g.find(".fpd-reset-product").click(function(a) {
            a.preventDefault(), x.loadProduct(J)
        }).show(), g.find(".fpd-zoom").hide(), d.maxZoom > 1 && (g.find(".fpd-set-zoom").data("step", d.zoomStep).data("max", d.maxZoom).on("slide", function(a, b) {
            x.setZoom(b.value)
        }), g.find(".fpd-stage-pan").click(function() {
            P = P ? !1 : !0, $(this).toggleClass("fpd-checked"), j.find("canvas").toggleClass("fpd-drag")
        }), g.find(".fpd-zoom > .fpd-btn").click(function() {
            g.find(".fpd-set-zoom").slider("value", 1), P = !1, j.find("canvas").removeClass("fpd-drag"), g.find(".fpd-stage-pan").removeClass("fpd-checked"), $(this).next(".fpd-option-content").stop().toggle(300), x.resetZoom()
        }).parent().show()), ga()
    }, ga = function() {
            var a = j.children("canvas").get(0);
            if (r = new fabric.Canvas(a, {
                selection: !1,
                hoverCursor: "pointer",
                controlsAboveOverlay: !0,
                centeredScaling: !0
            }), r.setDimensions({
                width: g.width(),
                height: d.stageHeight
            }), 1 !== window.devicePixelRatio) {
                var b = r.getElement();
                b.setAttribute("width", g.width() * window.devicePixelRatio), b.setAttribute("height", d.stageHeight * window.devicePixelRatio), b.getContext("2d").scale(window.devicePixelRatio, window.devicePixelRatio)
            }
            r.on({
                "mouse:down": function(a) {
                    if (s = r.getPointer(a.e), O = !0, void 0 == a.target) x.closeDialog(), x.deselectElement();
                    else {
                        var b = r.getPointer(a.e),
                            c = a.target.findTargetCorner(b);
                        if ("tr" == c && K.params.removable && x.removeElement(K), "tl" == c && K.params.isInitial !== !0 && !K.params.hasUploadZone) {
                            var d = jQuery.extend({}, K.params, {
                                autoSelect: !0,
                                x: K.params.x + K.width
                            });
                            x.addElement(K.type, K.source, "Copy " + K.title, d)
                        }
                    }
                },
                "mouse:up": function() {
                    O = !1
                },
                "mouse:move": function(a) {
                    if (O && P) {
                        var b = r.getPointer(a.e),
                            c = Q.x + b.x - s.x,
                            d = Q.y + b.y - s.y;
                        r.relativePan(new fabric.Point(c, d))
                    }
                },
                "text:changed": function(a) {
                    x.setElementParameters(K, {
                        text: a.target.text
                    })
                },
                "object:moving": function(a) {
                    (K && K.params.draggable || d.editorMode) && x.setElementParameters(K, {
                        x: Math.round(a.target.left / M),
                        y: Math.round(a.target.top / M)
                    })
                },
                "object:scaling": function(a) {
                    (K && K.params.resizable || d.editorMode) && x.setElementParameters(K, {
                        scale: Number(a.target.scaleX / M).toFixed(2)
                    })
                },
                "object:rotating": function(a) {
                    (K && K.params.rotatable || d.editorMode) && (K.set({
                        originX: K.params.originX,
                        originY: K.params.originY
                    }), x.setElementParameters(K, {
                        degree: Math.round(a.target.angle)
                    }))
                },
                "object:selected": function(a) {
                    if (x.deselectElement(!1), P) return x.deselectElement(), !1;
                    K = a.target;
                    var b = K.params;
                    if (!k.hasClass("fpd-fixed")) {
                        var c = K.getLeft() + ("left" === K.originX ? K.getWidth() : .5 * K.getWidth()) + 40;
                        K.getLeft() > .5 * g.width() && (c = K.getLeft() - .5 * K.getWidth() - k.width() - 40), c += i.offset().left, c = 0 > c ? 0 : c, c = c - k.width() > y.width() ? c - k.width() : c, k.css({
                            left: c
                        })
                    }
                    if (b.uploadZone && !d.editorMode) {
                        K.set("borderColor", "transparent");
                        var e = $.extend({}, N.customAdds, b.customAdds ? b.customAdds : {}),
                            a = {};
                        return a.customAdds = e, Ka(a), F = K.title, x.callDialogContent("adds", g.find('[data-context="adds"] span').text(), null, !0), !1
                    }
                    if (F = null, K.set({
                        borderColor: d.selectedColor,
                        cornerColor: "transparent",
                        cornerSize: 20,
                        rotatingPointOffset: 0,
                        padding: "text" == K.type || "i-text" == K.type ? d.paddingControl : 0
                    }), x.callDialogContent("edit", d.labels.editElement, null, !1), Array.isArray(b.colors) && 0 != wa(K) || "path-group" == K.type) {
                        if ("path-group" == K.type) {
                            for (var f = 0; f < K.paths.length; ++f) {
                                var h = K.paths[f],
                                    j = tinycolor(h.fill);
                                m.append('<input type="text" value="' + j.toHexString() + '" />')
                            }
                            m.addClass("fpd-colorpicker-group").find("input").spectrum({
                                preferredFormat: "hex",
                                showInput: !0,
                                change: function(a) {
                                    for (var b = m.find("input").index(this), c = [], d = 0; d < K.paths.length; ++d) {
                                        var e = K.paths[d],
                                            f = tinycolor(e.fill);
                                        c.push(f.toHexString())
                                    }
                                    c[b] = a.toHexString(), x.setElementParameters(K, {
                                        currentColor: c
                                    })
                                }
                            }), Ta()
                        } else if (b.colors.length > 1) {
                            m.html('<div class="fpd-color-palette fpd-grid"></div>');
                            for (var f = 0; f < b.colors.length; ++f) {
                                var j = b.colors[f];
                                colorName = d.hexNames[j.replace("#", "")], colorName = colorName ? colorName : j, m.children(".fpd-grid").append('<div class="fpd-item fpd-tooltip" title="' + colorName + '" style="background-color: ' + j + ';"></div>').children(".fpd-item:last").click(function() {
                                    var a = tinycolor($(this).css("backgroundColor"));
                                    x.setElementParameters(K, {
                                        currentColor: a.toHexString()
                                    })
                                })
                            }
                            Ma()
                        } else m.append('<input type="text" value="' + (b.currentColor ? b.currentColor : b.colors[0]) + '" />'), m.find("input").spectrum("destroy").spectrum({
                            preferredFormat: "hex",
                            showInput: !0,
                            change: function(a) {
                                x.setElementParameters(K, {
                                    currentColor: a.toHexString()
                                })
                            }
                        }), Ta();
                        Qa(m, !0), Qa(k.find(".fpd-opacity-slider"), !0)
                    }
                    if ("i-text" == K.type || "curvedText" == K.type) Qa(k.find(".fpd-patterns"), b.patternable && d.patterns.length), Qa(k.find(".fpd-change-text"), b.editable), Qa(k.find(".fpd-fonts-dropdown"), b.editable && d.fonts && d.fonts.length > 0), Qa(k.find(".fpd-line-height-slider"), b.editable), Qa(k.find(".fpd-text-align-left"), b.editable), Qa(k.find(".fpd-text-style-bold"), b.editable), b.curvable && (Qa(k.find(".fpd-curved-text-switcher").toggleClass("fpd-checked", b.curved), !0), b.curved && (Qa(k.find(".fpd-curved-text-radius-slider"), !0), Qa(k.find(".fpd-curved-text-spacing-slider"), !0), Qa(k.find(".fpd-curved-text-reverse-switcher"), !0), k.find(".fpd-curved-text-options:gt(0)").toggleClass("fpd-hidden", !k.find(".fpd-curved-text-switcher").hasClass("fpd-checked"))));
                    else if (b.filters && b.filters.length > 0 && "image" == K.type) {
                        k.find(".fpd-filter-options").removeClass("fpd-hidden").find(".fpd-item:gt(0)").addClass("fpd-hidden");
                        for (var f = 0; f < b.filters.length; ++f) k.find(".fpd-filter-options").find(".fpd-filter-" + b.filters[f]).removeClass("fpd-hidden")
                    }
                    if (Qa(k.find(".fpd-angle-slider"), b.rotatable), Qa(k.find(".fpd-scale-slider"), b.resizable), k.find(".fpd-moveLayer-options").toggleClass("fpd-hidden", !b.zChangeable), k.find(".fpd-alignment-options").toggleClass("fpd-hidden", !b.draggable), k.find(".fpd-flip-options").toggleClass("fpd-hidden", !b.resizable), k.find(".fpd-helper-btns").removeClass("fpd-hidden"), b.boundingBox && !d.editorMode) {
                        var l = x.getBoundingBoxCoords(K);
                        l && (E = new fabric.Rect({
                            left: l.left,
                            top: l.top,
                            width: l.width,
                            height: l.height,
                            stroke: d.boundingBoxColor,
                            strokeWidth: 1,
                            fill: !1,
                            selectable: !1,
                            evented: !1,
                            originX: "left",
                            originY: "top",
                            name: "bounding-box",
                            params: {
                                x: l.left,
                                y: l.top,
                                scale: 1
                            }
                        }), r.add(E), E.bringToFront())
                    }
                    Wa(), Ra(), Ga(M), la(K), ua(K), Va(), g.trigger("elementSelect", [K])
                }
            }), ha()
        }, ha = function() {
            function a(b) {
                var c = Ua(b);
                s.filters = [], null != c && s.filters.push(c), s.applyFilters(function() {
                    p++, k.find(".fpd-filter-" + b).removeClass("fpd-hidden").children("picture").css("background-image", "url(" + s.toDataURL() + ")"), p != t.length ? a(t[p]) : r.remove(s)
                })
            }
            k.addClass("fpd-" + d.dialogBoxPositioning), "dynamic" == d.dialogBoxPositioning ? k.draggable({
                handle: k.find(".fpd-dialog-head"),
                drag: function(a, b) {
                    b.offset.top <= 0 && (b.position.top = 0), m.find("input").spectrum("reflow")
                }
            }).resizable({
                resize: function() {
                    Ya()
                },
                stop: function() {
                    Xa(!1)
                }
            }) : ("left" == d.dialogBoxPositioning || "right" == d.dialogBoxPositioning) && k.addClass("fpd-fixed"), k.find(".fpd-dialog-head .fpd-close-dialog").click(function() {
                x.deselectElement(), x.closeDialog()
            }), k.find(".fpd-content-back").click(function() {
                $(this).removeClass("fpd-show"), k.find(".fpd-content-sub.fpd-show").removeClass("fpd-show"), Na(k.find(".fpd-content-back").data("parentTitle"))
            }), k.on("click", ".fpd-content-layers .fpd-list-row", function() {
                if ($(this).hasClass("fpd-locked")) return !1;
                for (var a = r.getObjects(), b = 0; b < a.length; ++b)
                    if (a[b].id == this.id) {
                        r.setActiveObject(a[b]);
                        break
                    }
            }), k.on("click", ".fpd-content-layers .fpd-lock-element", function(a) {
                a.stopPropagation();
                var b = $(this),
                    c = Sa(b.parents(".fpd-list-row").attr("id"));
                c.evented ? (c.evented = !1, b.children("i").removeClass("fpd-icon-unlocked").addClass("fpd-icon-locked"), b.parents(".fpd-list-row").addClass("fpd-locked").children("div:lt(2)").css("opacity", .2).css("pointer-events", "none")) : (c.evented = !0, b.children("i").removeClass("fpd-icon-locked").addClass("fpd-icon-unlocked"), b.parents(".fpd-list-row").removeClass("fpd-locked").children("div:lt(2)").css("opacity", 1).css("pointer-events", "visible")), b.tooltipster("content", c.evented ? d.labels.lock : d.labels.unlock), b.parents(".fpd-list:first").sortable("refresh")
            }), k.on("click", ".fpd-content-layers .fpd-remove-element", function(a) {
                a.stopPropagation(), x.removeElement($(this).parents(".fpd-list-row").children(".fpd-cell-1").text())
            });
            var b;
            k.find(".fpd-content-layers .fpd-list").sortable({
                handle: ".fpd-icon-reorder",
                placeholder: "fpd-sortable-placeholder",
                scroll: !0,
                axis: "y",
                items: ".fpd-list-row:not(.fpd-locked)",
                start: function(a, c) {
                    v = c.originalPosition.top, c.placeholder.addClass("fpd-list-row").html("<div></div>"), b = null;
                    for (var d = r.getObjects(), e = 0; e < d.length; ++e)
                        if (d[e].id == c.item.attr("id")) {
                            b = d[e];
                            break
                        }
                },
                change: function(a, c) {
                    if (c.position.top < v) var d = c.placeholder.nextAll(".fpd-list-row:not(.ui-sortable-helper):first");
                    else var d = c.placeholder.prevAll(".fpd-list-row:not(.ui-sortable-helper):first");
                    v = c.position.top;
                    var e = 0;
                    0 === d.size() ? e = r.getObjects().length - 1 : (e = r.getObjects().indexOf(Sa(d.attr("id"))), d.is(c.placeholder.nextAll(".fpd-list-row:not(.ui-sortable-helper):last")) && e--), e = 0 > e ? 0 : e, b && b.moveTo(e)
                }
            });
            var c = k.find(".fpd-input-image");
            if (k.find(".fpd-add-image").click(function(a) {
                a.preventDefault(), c.click()
            }), k.find(".fpd-upload-form").on("change", function(a) {
                if (window.FileReader) {
                    var b = new FileReader,
                        d = a.target.files[0].name;
                    b.readAsDataURL(a.target.files[0]), b.onload = function(a) {
                        x.addCustomImage(a.target.result, d)
                    }
                }
                c.val("")
            }), k.find(".fpd-add-text").click(function() {
                var a = $(this).children(".fpd-input-text");
                a.addClass("fpd-show-up").children("input").focus(), setTimeout(function() {
                    a.children("input").focus()
                }, 100)
            }), k.find(".fpd-input-text > .fpd-btn").click(function(a) {
                a.stopPropagation();
                var b = $(this).prev("input:first"),
                    c = b.val();
                if (c && c.length > 0) {
                    var d = $.extend({}, N.customTextParameters, {
                        isCustom: !0
                    });
                    x.addElement("text", c, c, d, I)
                }
                k.find(".fpd-add-text .fpd-input-text").removeClass("fpd-show-up"), b.val("")
            }), k.find(".fpd-input-text > input").keyup(function(a) {
                13 == a.keyCode && k.find(".fpd-input-text > .fpd-btn").click()
            }), d.facebookAppId && d.facebookAppId.length > 0) {
                var e = k.find(".fpd-add-facebook-photo-wrapper .fpd-grid");
                k.find(".fpd-add-facebook-photo").click(function() {
                    x.callDialogContent("adds", $(this).children("span").text(), "facebook")
                });
                var h = k.find(".fpd-fb-user-albums").change(function() {
                    l.show();
                    var a = $(this).children("option:selected").val();
                    e.children(".fpd-item").remove(), FB.api("/" + a, function(b) {
                        var c = b.count;
                        FB.api("/" + a + "?fields=photos.limit(" + c + ")", function(a) {
                            if (!a.error)
                                for (var b = a.photos.data, c = 0; c < b.length; ++c) {
                                    var f = b[c],
                                        g = f.images[f.images.length - 1] ? f.images[f.images.length - 1].source : f.source,
                                        h = e.append('<div class="fpd-item" data-picture="' + f.source + '" title="' + f.id + '"><picture></picture></div>').children(".fpd-item:last").click(function(a) {
                                            a.preventDefault(), q.show();
                                            var b = $(this);
                                            $.post(d.phpDirectory + "get_image_data_url.php", {
                                                url: b.data("picture")
                                            }, function(a) {
                                                if (a && void 0 == a.error) {
                                                    var c = new Image;
                                                    c.src = a.data_url, c.onload = function() {
                                                        d.customImageParameters.scale = x.getScalingByDimesions(this.width, this.height, d.customImageParameters.resizeToW, d.customImageParameters.resizeToH), x.addCustomImage(this.src, b.attr("title"))
                                                    }
                                                } else alert(a.error)
                                            }, "json").fail(function(a) {
                                                q.hide(), alert(a.statusText)
                                            })
                                        });
                                    Za(h.children("picture"), g), ta(e.parent())
                                }
                            l.hide();
                        });
                    });
                });
                $.ajaxSetup({
                    cache: !0
                }), $.getScript("//connect.facebook.com/en_US/sdk.js", function() {
                    FB.init({
                        appId: d.facebookAppId,
                        status: !0,
                        cookie: !0,
                        xfbml: !0,
                        version: "v2.0"
                    }), FB.Event.subscribe("auth.statusChange", function(a) {
                        "connected" === a.status ? (l.show(), FB.api("/me/albums", function(a) {
                            for (var b = a.data, c = 0; c < b.length; ++c) {
                                var d = b[c];
                                h.append('<option value="' + d.id + '">' + d.name + "</option>").nextAll(".select2").show()
                            }
                            l.hide();
                        })) : (e.children(".fpd-item").remove(), h.empty().val("").change().nextAll(".select2").hide())
                    });
                });
            }
            if (d.instagramClientId.length && (k.find(".fpd-add-instagram-photo").click(function() {
                k.find(".fpd-insta-feed").click(), x.callDialogContent("adds", $(this).children("span").text(), "instagram")
            }), k.find(".fpd-insta-feed, .fpd-insta-recent-images").click(function(a) {
                a.preventDefault();
                var b = $(this),
                    c = b.hasClass("fpd-insta-feed") ? "feed" : "recent";
                Y = window.localStorage.getItem("fpd_instagram_access_token"), X && null != Y ? Da(c) : Ca(function() {
                    Da(c)
                })
            })), f.size() > 0) {
                if (k.find(".fpd-add-design").click(function() {
                    x.callDialogContent("adds", $(this).children("span").text(), "designs")
                }), f.children(".fpd-category").length > 1) C = k.find(".fpd-add-design-wrapper .fpd-content-head").append('<select class="fpd-design-categories" tabindex="1"></select>').children(".fpd-design-categories").change(function() {
                    var a = D[this.value];
                    k.find(".fpd-add-design-wrapper .fpd-grid > .fpd-item").remove();
                    for (var b = 0; b < a.length; ++b) Ba(a[b]);
                    Xa(!1)
                }), f.children(".fpd-category").each(function(a, b) {
                    var c = $(b),
                        d = c.data("parameters") ? c.data("parameters") : {};
                    c.children("img").each(function(a, c) {
                        var e = $(c);
                        x.addDesign(void 0 == e.data("src") ? e.attr("src") : e.data("src"), e.attr("title"), $.extend({}, d, e.data("parameters")), b.title, e.data("thumbnail"))
                    })
                });
                else {
                    k.find(".fpd-add-design-wrapper").addClass("fpd-no-categories");
                    for (var i = f.find("img"), j = 0; j < i.length; ++j) {
                        var n = $(i[j]);
                        x.addDesign(void 0 == n.data("src") ? n.attr("src") : n.data("src"), n.attr("title"), n.data("parameters"), !1, n.data("thumbnail"))
                    }
                }
                f.remove()
            }
            if (d.patterns && d.patterns.length > 0)
                for (var j = 0; j < d.patterns.length; ++j) {
                    var o = d.patterns[j];
                    k.find(".fpd-patterns > .fpd-grid").append('<div class="fpd-item" data-pattern="' + o + '"><picture style="background-image: url(' + o + ');"></picture></div>').children(":last").click(function() {
                        x.setElementParameters(K, {
                            pattern: $(this).data("pattern")
                        })
                    })
                }
            k.find(".fpd-opacity-slider").on("slide", function(a, b) {
                x.setElementParameters(K, {
                    opacity: b.value
                })
            }), k.find(".fpd-change-text").keyup(function() {
                x.setElementParameters(K, {
                    text: this.value
                })
            });
            var p = 0,
                s = null,
                t = ["no", "grayscale", "sepia", "sepia2"];
            if (fabric.Image.fromURL(fancyProductDesignerFilterImg, function(b) {
                s = b, r.add(s.set({
                    top: -1e4,
                    left: -1e4
                })), a(t[0])
            }), k.find(".fpd-filter-options .fpd-item").click(function() {
                x.setElementParameters(K, {
                    filter: $(this).data("filter")
                })
            }), d.fonts.length > 0) {
                k.find(".fpd-fonts-dropdown").change(function() {
                    x.setElementParameters(K, {
                        font: this.value
                    })
                }), d.fonts.sort();
                for (var j = 0; j < d.fonts.length; ++j) {
                    var u = -1 == d.fonts[j].indexOf(":") ? d.fonts[j] : d.fonts[j].substring(0, d.fonts[j].indexOf(":"));
                    0 == k.find(".fpd-fonts-dropdown").children('option[value="' + u + '"]').size() && k.find(".fpd-fonts-dropdown").append('<option value="' + u + '" style="font-family: ' + u + ';">' + u + "</option>")
                }
                k.find(".fpd-fonts-dropdown").on("select2:open", function() {
                    $(this).children("option").each(function(a, b) {
                        $(".select2-results").find("li").eq(a).css("font-family", b.value)
                    })
                })
            }
            k.find(".fpd-line-height-slider").on("slide", function(a, b) {
                x.setElementParameters(K, {
                    lineHeight: b.value
                })
            }), k.find(".fpd-set-alignment .fpd-btn").click(function(a) {
                a.preventDefault();
                var b = $(this);
                b.hasClass("fpd-text-align-left") ? x.setElementParameters(K, {
                    textAlign: "left"
                }) : b.hasClass("fpd-text-align-center") ? x.setElementParameters(K, {
                    textAlign: "center"
                }) : b.hasClass("fpd-text-align-right") && x.setElementParameters(K, {
                    textAlign: "right"
                }), "curvedText" == K.type && K.setFill(K.fill), r.renderAll()
            }), k.find(".fpd-set-style .fpd-btn").click(function(a) {
                a.preventDefault();
                var b = $(this);
                b.hasClass("fpd-text-style-bold") ? x.setElementParameters(K, {
                    fontWeight: "bold" == K.getFontWeight() ? "normal" : "bold"
                }) : b.hasClass("fpd-text-style-italic") ? x.setElementParameters(K, {
                    fontStyle: "italic" == K.getFontStyle() ? "normal" : "italic"
                }) : b.hasClass("fpd-text-style-underline") && x.setElementParameters(K, {
                    textDecoration: "underline" == K.getTextDecoration() ? "normal" : "underline"
                }), "curvedText" == K.type && K.setFill(K.fill), r.renderAll()
            }), k.find(".fpd-angle-slider").on("slide", function(a, b) {
                x.setElementParameters(K, {
                    degree: b.value
                })
            }), k.find(".fpd-scale-slider").on("slide", function(a, b) {
                x.setElementParameters(K, {
                    scale: b.value
                })
            }), k.find(".fpd-move-up, .fpd-move-down").click(function() {
                var a = $(this),
                    b = k.find(".fpd-content-layers .fpd-list"),
                    c = b.children('[id="' + K.id + '"]');

                if (a.hasClass("fpd-move-down")) {
                    if (c.prev("div").size() > 0) {
                        c.insertBefore(c.prev("div:first"));
                        var d = c.nextAll(".fpd-list-row:not(.ui-sortable-helper):first"),
                            e = r.getObjects().indexOf(Sa(d.attr("id")));
                        K.moveTo(e)
                    }
                } else if (c.next("div").size() > 0) {
                    c.insertAfter(c.next("div:first"));
                    var d = c.prevAll(".fpd-list-row:not(.ui-sortable-helper):first"),
                        e = r.getObjects().indexOf(Sa(d.attr("id")));
                    K.moveTo(e)
                }
            }), k.find(".fpd-center-horizontal, .fpd-center-vertical").click(function() {
                var a = $(this);
                ra(K, a.hasClass("fpd-center-horizontal"), a.hasClass("fpd-center-vertical"), E ? x.getBoundingBoxCoords(K) : !1)
            }), k.find(".fpd-curved-text-switcher").click(function() {
                function a(b, c) {
                    r.setActiveObject(c), g.off("elementAdded", a)
                }
                var b = ya(K),
                    c = K.getText(),
                    d = K.params;
                d.z = b, d.curved = "i-text" == K.type, d.textAlign = "center", g.on("elementAdded", a), x.removeElement(K), x.addElement("text", c, c, d)
            }), k.find(".fpd-curved-text-radius-slider").on("slide", function(a, b) {
                K && K.params.curved && x.setElementParameters(K, {
                    curveRadius: b.value
                })
            }), k.find(".fpd-curved-text-spacing-slider").on("slide", function(a, b) {
                K && K.params.curved && x.setElementParameters(K, {
                    curveSpacing: b.value
                })
            }), k.find(".fpd-curved-text-reverse-switcher").click(function() {
                K && K.params.curved && ($(this).toggleClass("fpd-checked"), x.setElementParameters(K, {
                    curveReverse: $(this).hasClass("fpd-checked")
                }))
            }), k.find(".fpd-flip-horizontal, .fpd-flip-vertical").click(function() {
                $(this).hasClass("fpd-flip-horizontal") ? x.setElementParameters(K, {
                    flipX: !K.flipX
                }) : x.setElementParameters(K, {
                    flipY: !K.flipY
                })
            }), k.find(".fpd-reset-element").click(function() {
                if (K) {
                    var a = K.originParams,
                        b = K,
                        c = {
                            x: a.x,
                            y: a.y,
                            currentColor: a.currentColor,
                            degree: a.degree,
                            opacity: a.opacity,
                            scale: a.scale
                        };
                    if (void 0 !== a.text && (c.text = a.text, c.font = a.font, c.lineHeight = a.lineHeight, c.textAlign = a.textAlign, c.fontWeight = a.fontWeight, c.fontStyle = a.fontStyle, c.curveSpacing = a.curveSpacing, c.curveRadius = a.curveRadius), x.deselectElement(), x.setElementParameters(b, c), a.autoCenter && qa(b), r.setActiveObject(b), a.colors && a.currentColor != a.colors[0]) {
                        var d = "path-group" == b.type ? a.colors : a.colors[0];
                        x.setElementParameters(b, {
                            currentColor: d
                        }), r.renderAll()
                    }
                    Va(), $(this).tooltipster("hide")
                }
            }), ia()
        }, ia = function() {
            e.is(".fpd-category") && e.filter(".fpd-category").size() > 1 ? (A = k.find(".fpd-content-products .fpd-content-head").append('<select class="fpd-product-categories"></select>').children(".fpd-product-categories").change(function() {
                H = -1;
                var a = B[this.value];
                k.find(".fpd-content-products .fpd-grid > .fpd-item").remove();
                for (var b = 0; b < a.length; ++b) Aa(a[b]);
                Xa(!1)
            }), e.each(function(a, b) {
                var c = $(b);
                ja(c.children(".fpd-product"), c.attr("title"))
            })) : (k.find(".fpd-content-products").addClass("fpd-no-categories"), e = 0 === e.filter(".fpd-category").size() ? e : e.children(".fpd-product"), ja(e, !1)), z.find(".fpd-slider").each(function(a, b) {
                var c = $(b);
                c.slider({
                    range: "min",
                    value: c.data("value"),
                    min: c.data("min"),
                    max: c.data("max"),
                    step: c.data("step")
                }), c.find(".ui-slider-range, .ui-slider-handle").addClass("fpd-secondary-bg-color fpd-secondary-text-color")
            }), k.find("select").select2({
                width: "100%",
                dir: z.css("direction")
            }), k.find(".fpd-tabs > .fpd-btn").click(function() {
                var a = $(this);
                a.parent().children(".fpd-btn").removeClass("fpd-checked"), a.addClass("fpd-checked")
            }), k.find(".fpd-switch-container").click(function() {
                var a = $(this);
                a.hasClass("fpd-curved-text-switcher") && k.find(".fpd-curved-text-options:gt(0)").toggleClass("fpd-hidden", !a.hasClass("fpd-checked"))
            }), z.mousedown(function() {
                t = S.length
            }).mouseup(function() {
                setTimeout(function() {
                    u = S.length, t != u && S.splice(t + 1, S.length - 1), g.find(".fpd-undo").toggleClass("fpd-disabled", 0 == S.length || !K)
                }, 5)
            }), z.on({
                mousewheel: function(a) {
                    $(a.target).parents(".fpd-dialog-content").size() > 0 && (a.preventDefault(), a.stopPropagation())
                }
            }), ta(k.find(".fpd-content-layers, .fpd-content-edit, .fpd-content-saved-products, .fpd-content-products .fpd-content-main")), d.editorMode && $.post(d.templatesDirectory + "editorbox.php", function(a) {
                "string" == typeof d.editorMode ? p = $(d.editorMode).append($.parseHTML(a)).children(".fpd-editor-box") : (g.after($.parseHTML(a)), p = g.next(".fpd-editor-box"))
            }), h.remove(), g.addClass("fpd-show-up"), $(window).resize(Ra), Ra(), g.trigger("ready"), k.find(".fpd-content-products .fpd-item:first").size() > 0 && !W ? k.find(".fpd-content-products .fpd-item:first").click() : q.hide()
        }, ja = function(a, b) {
            for (var c = [], d = 0; d < a.length; ++d) {
                c = $(a.get(d)).children(".fpd-product"), c.splice(0, 0, a.get(d));
                var e = [];
                c.each(function(a, b) {
                    var c = $(b),
                        d = {
                            title: b.title,
                            thumbnail: c.data("thumbnail"),
                            elements: [],
                            options: c.data("options")
                        };
                    c.children("img,span").each(function(a, b) {
                        var c, e = $(b);
                        c = e.is("img") ? void 0 == e.data("src") ? e.attr("src") : e.data("src") : e.text();
                        var f = {
                            type: e.is("img") ? "image" : "text",
                            source: c,
                            title: e.is("img") ? e.attr("title") : e.text(),
                            parameters: void 0 == e.data("parameters") || e.data("parameters").length <= 2 ? {} : e.data("parameters")
                        };
                        f.parameters.isInitial = !0, d.elements.push(f)
                    }), e.push(d)
                }), x.addProduct(e, b)
            }
        }, ka = function(a, b) {
            function c() {
                if (e++, e < b.length) {
                    var d = b[e];
                    x.addElement(d.type, d.source, d.title, d.parameters, G - 1)
                } else g.off("elementAdded", c), g.trigger("viewCreate", [b, a])
            }
            var d = b[0];
            if (d) {
                var e = 0;
                g.on("elementAdded", c), x.addElement(d.type, d.source, d.title, d.parameters, G - 1)
            } else g.trigger("viewCreate", [b, a])
        }, la = function(a) {
            if (E && !a.params.boundingBoxClipping && !a.params.hasUploadZone) {
                for (var b = [E, a], c = 0; c < b.length; ++c) b[c].scaleX = b[c].params.scale * M, b[c].scaleY = b[c].params.scale * M, b[c].left = b[c].params.x * M, b[c].top = b[c].params.y * M, b[c].setCoords();
                var e = a.oCoords.tl,
                    f = !1,
                    h = a.isOut,
                    f = !a.isContainedWithinObject(E);
                f ? (a.borderColor = d.outOfBoundaryColor, d.tooltips && n.css({
                    right: r.getWidth() - e.x - .5 * a.getWidth(),
                    top: e.y - n.outerHeight() - 20
                }).show(), a.isOut = !0) : (a.borderColor = d.selectedColor, n.hide(), a.isOut = !1), h != a.isOut && void 0 != h && g.trigger(f ? "elementOut" : "elementIn")
            }
        }, ma = function(a, b, c) {
            if (c = "undefined" == typeof c ? !1 : c, 4 == b.length && (b += b.substr(1, b.length)), "i-text" == a.type || "curvedText" == a.type) b = b === !1 ? "#000000" : b, a.setFill(b), r.renderAll(), 0 == c && (a.params.pattern = null), m.find("input").spectrum("set", b), na(a, b);
            else if ("path-group" == a.type && "object" == typeof b)
                for (var d = 0; d < b.length; ++d) a.paths[d].setFill(b[d]), m.find("input").eq(d).spectrum("set", b[d]);
            else {
                var e = wa(a);
                if ("png" == e || "dataurl" == e) {
                    0 == b ? a.filters = [] : (a.filters.push(new fabric.Image.filters.Tint({
                        color: b
                    })), na(a, b));
                    try {
                        a.applyFilters(function() {
                            r.renderAll(), z.mouseup()
                        })
                    } catch (f) {
                        alert("Image element could not be colorized. Please be sure that the image is hosted under the same domain and protocol, in which you are using the product designer!")
                    }
                } else "svg" == e && a.setFill(b);
                m.find("input").spectrum("set", b)
            }
            0 == c && (a.params.currentColor = b), oa(a, b)
        }, na = function(a, b) {
            if (a.params.colorPrices && "object" == typeof a.params.colors) {
                void 0 !== a.params.currentColorPrice && (a.params.price -= a.params.currentColorPrice, L -= a.params.currentColorPrice);
                var c = b.replace("#", "");
                if (a.params.colorPrices.hasOwnProperty(c) || a.params.colorPrices.hasOwnProperty(c.toUpperCase())) {
                    var d = void 0 === a.params.colorPrices[c] ? a.params.colorPrices[c.toUpperCase()] : a.params.colorPrices[c];
                    a.params.currentColorPrice = d, a.params.price += a.params.currentColorPrice, L += a.params.currentColorPrice
                } else a.params.currentColorPrice = 0;
                g.trigger("priceChange", [a.params.price, L])
            }
        }, oa = function(a, b) {
            if (a.colorControlFor)
                for (var c = a.colorControlFor, d = 0; d < c.length; ++d) ma(c[d], b)
        }, pa = function() {
            return X ? JSON.parse(window.localStorage.getItem(g.attr("id"))) : !1
        }, qa = function(a) {
            ra(a, !0, !0, x.getBoundingBoxCoords(a)), a.params.autoCenter = !1
        }, ra = function(a, b, c, e) {
            var f, g;
            b && (f = e ? "left" == a.originX ? e.left + .5 * e.width - .5 * a.width : e.left + .5 * e.width : "left" == a.originX ? .5 * d.width - .5 * a.width : .5 * d.width, a.left = f), c && (g = e ? "left" == a.originX ? e.top + .5 * e.height - .5 * a.width : e.top + .5 * e.height : "left" == a.originX ? .5 * d.stageHeight - .5 * a.height : .5 * d.stageHeight, a.top = g), la(a), r.renderAll(), a.setCoords(), void 0 != f && (a.params.x = f), void 0 != g && (a.params.y = g), Ra()
        }, sa = function(a, b) {
            var c = k.find(".fpd-content-saved-products .fpd-grid");
            c.append('<div class="fpd-item"><picture style="background-image: url(' + a + ')" ></picture><div class="fpd-btn fpd-trans"><i class="fpd-icon-remove"></i></div></div>').children(".fpd-item:last").click(function() {
                x.loadProduct($(this).data("product")), H = -1
            }).data("product", b).children(".fpd-btn").click(function(a) {
                a.stopPropagation();
                var b = $(this).parent(".fpd-item"),
                    c = b.parent(".fpd-grid").children(".fpd-item").index(b.remove()),
                    d = pa();
                d.splice(c, 1), window.localStorage.setItem(g.attr("id"), JSON.stringify(d))
            })
        }, ta = function(a) {
            a.hasClass("mCSB_container") ? a.mCustomScrollbar("scrollTo", 0) : a.mCustomScrollbar({
                scrollbarPosition: "outside",
                autoExpandScrollbar: !0,
                autoHideScrollbar: !0,
                scrollInertia: 200,
                callbacks: {
                    onScrollStart: function() {
                        m.find("input").spectrum("hide")
                    },
                    whileScrolling: function() {
                        100 == this.mcs.topPct && Xa(!0)
                    }
                }
            })
        }, ua = function(a) {
            if (void 0 == p) return !1;
            var b = a.params;
            p.find(".fpd-current-element").text(a.title), p.find(".fpd-position").text("x: " + parseInt(b.x) + " y: " + parseInt(b.y)), p.find(".fpd-dimensions").text("width: " + Math.round(a.getWidth()) + " height: " + Math.round(a.getHeight())), p.find(".fpd-scale").text(Number(Number(b.scale) % 360).toFixed(2)), p.find(".fpd-degree").text(parseInt(b.degree)), p.find(".fpd-color").text(b.currentColor)
        }, va = function(a) {
            WebFont.load({
                custom: {
                    families: [a]
                },
                fontactive: function() {
                    z.mouseup(), r.renderAll()
                }
            })
        }, wa = function(a) {
            if ("i-text" == a.type || "curvedText" == a.type) return "text";
            var b = a.source.split(".");
            return 1 == b.length ? -1 == b[0].search("data:image/png;") ? (a.params.currentColor = a.params.colors = !1, !1) : "dataurl" : -1 == $.inArray("png", b) && -1 == $.inArray("svg", b) ? (a.params.currentColor = a.params.colors = !1, !1) : -1 == $.inArray("svg", b) ? "png" : "svg"
        }, xa = function(a, b) {
            if ("image" == a.type);
            else if ("i-text" == a.type || "curvedText" == a.type)
                if (b) fabric.util.loadImage(b, function(b) {
                    a.setFill(new fabric.Pattern({
                        source: b,
                        repeat: "repeat"
                    })), r.renderAll(), z.mouseup()
                });
                else {
                    var c = a.params.currentColor ? a.params.currentColor : a.params.colors[0];
                    c = c ? c : "#000000", a.setFill(c)
                }
        }, ya = function(a) {
            for (var b = r.getObjects(), c = 0, d = 0; d < b.length; ++d)
                if (b[d].visible) {
                    if (a === b[d]) return c;
                    c++
                }
        }, za = function(a, b) {
            for (var c = r.getObjects(), d = 0, e = 0; e < c.length; ++e) {
                var f = c[e];
                if (f.visible && void 0 !== f.title) {
                    if (d == b) {
                        a.moveTo(e);
                        break
                    }
                    d++
                }
            }
            Ha(), e++;
            for (var g = null, h = e; h < c.length; ++h) {
                var f = c[h];
                if (f.isEditable) {
                    g = f.id;
                    break
                }
            }
            if (null !== g) {
                var i = $a(g),
                    j = $a(a.id);
                i && j && j.insertBefore(i)
            }
        }, Aa = function(a) {
            var b = k.find(".fpd-content-products .fpd-grid"),
                c = d.lazyLoad ? "fpd-hidden" : "",
                e = b.append('<div class="fpd-item fpd-tooltip ' + c + '" title="' + a[0].title + '"><picture data-img="' + a[0].thumbnail + '"></picture></div>').children(".fpd-item:last").click(function(a) {
                    var c = $(this),
                        d = b.children(".fpd-item").index(c);
                    x.selectProduct(d), a.preventDefault()
                }).data("views", a);
            d.lazyLoad || Za(e.children("picture"), a[0].thumbnail), (2 == b.children(".fpd-item").length || !b.parents(".fpd-no-categories").size() > 0) && g.find('[data-context="products"]').css("display", "inline-block"), Ma()
        }, Ba = function(a) {
            var b = k.find(".fpd-add-design-wrapper .fpd-grid"),
                c = d.lazyLoad ? "fpd-hidden" : "",
                e = b.append('<div class="fpd-item fpd-tooltip ' + c + '" data-source="' + a.source + '" data-title="' + a.title + '" title="' + a.title + '"><picture data-img="' + a.thumbnail + '"></picture></div>').children(".fpd-item:last").click(function() {
                    var a = $(this),
                        b = a.data("parameters");
                    b.isCustom = !0, x.addElement("image", a.data("source"), a.data("title"), b, I)
                }).data("parameters", a.parameters);
            d.lazyLoad || Za(e.children("picture"), a.thumbnail), ta(b.parent()), Ma()
        }, Ca = function(a) {
            var b = (window.screen.width - 700) / 2,
                c = (window.screen.height - 500) / 2,
                e = window.open(d.phpDirectory + "/instagram_auth.php", "", "width=700,height=500,left=" + b + ",top=" + c);
            Ia(e), e.onload = new function() {
                0 == window.location.hash.length && e.open("https://instagram.com/oauth/authorize/?client_id=" + d.instagramClientId + "&redirect_uri=" + d.instagramRedirectUri + "&response_type=token", "_self");
                var b = setInterval(function() {
                    try {
                        e.location.hash.length && (clearInterval(b), Y = e.location.hash.slice(14), X && window.localStorage.setItem("fpd_instagram_access_token", Y), e.close(), void 0 != a && "function" == typeof a && a())
                    } catch (c) {}
                }, 100)
            }
        }, Da = function(a) {
            l.show();
            var b;
            switch (a) {
                case "feed":
                    b = "https://api.instagram.com/v1/users/self/feed?access_token=" + Y;
                    break;
                case "recent":
                    b = "https://api.instagram.com/v1/users/self/media/recent?access_token=" + Y;
                    break;
                default:
                    b = a
            }
            var c = k.find(".fpd-add-instagram-photo-wrapper .fpd-grid"),
                e = k.find(".fpd-add-instagram-photo-wrapper .fpd-insta-load-next");
            c.children(".fpd-item").remove(), $.ajax({
                method: "GET",
                url: b,
                dataType: "jsonp",
                jsonp: "callback",
                jsonpCallback: "jsonpcallback",
                cache: !1,
                success: function(b) {
                    b.data ? (b.pagination && b.pagination.next_url ? e.removeClass("fpd-disabled").data("href", b.pagination.next_url).off("click").on("click", function() {
                        Da($(this).data("href")), e.addClass("fpd-disabled").off("click")
                    }) : e.addClass("fpd-disabled").off("click"), $.each(b.data, function(a, b) {
                        if ("image" == b.type) var e = c.append('<div class="fpd-item" title="' + b.id + '" data-picture="' + b.images.standard_resolution.url + '"><picture></picture>').children(".fpd-item:last").click(function(a) {
                            a.preventDefault(), q.show();
                            var b = $(this);
                            $.post(d.phpDirectory + "get_image_data_url.php", {
                                url: b.data("picture")
                            }, function(a) {
                                if (a && void 0 == a.error) {
                                    var c = new Image;
                                    c.src = a.data_url, c.onload = function() {
                                        d.customImageParameters.scale = x.getScalingByDimesions(this.width, this.height, d.customImageParameters.resizeToW, d.customImageParameters.resizeToH), x.addCustomImage(this.src, b.attr("title"))
                                    }
                                } else alert(a.error)
                            }, "json").fail(function(a) {
                                q.hide(), alert(a.statusText)
                            })
                        });
                        void 0 !== e && Za(e.children("picture"), b.images.thumbnail.url), ta(c.parent())
                    }), l.hide()) : Ca(function() {
                        Da(a)
                    })
                },
                error: function() {
                    alert("Could not load data from instagram. Please try again!")
                }
            })
        }, Ea = function(a) {
            var b = x.getBoundingBoxCoords(a);
            b && (a.clippingRect = b, a.setClipTo(function(a) {
                Fa(a, this)
            }))
        }, Fa = function(a, b, c) {
            c = void 0 === c ? 1 : c;
            var d = b.clippingRect,
                e = 1 / b.scaleX,
                f = 1 / b.scaleY;
            a.save(), a.translate(0, 0), a.rotate(fabric.util.degreesToRadians(-1 * b.angle)), a.scale(e, f), a.beginPath(), a.rect(d.left * M - b.left - ("left" == b.originX ? .5 * b.width * M : 0), d.top * M - b.top - ("top" == b.originY ? .5 * b.height * M : 0), d.width * M * c, d.height * M * c), a.fillStyle = "transparent", a.fill(), a.closePath(), a.restore()
        }, Ga = function(a) {
            for (var b = r.getObjects(), c = 0; c < b.length; ++c) {
                var d = b[c];
                d.params && (d.scaleX = d.params.scale * a, d.scaleY = d.params.scale * a, d.left = d.params.x * a, d.top = d.params.y * a, d.setCoords())
            }
            return b
        }, Ha = function() {
            for (var a = r.getObjects(), b = [], c = 0; c < a.length; ++c) {
                var d = a[c];
                d.visible && d.params && d.params.topped && b.push(d)
            }
            for (var c = 0; c < b.length; ++c) b[c].bringToFront()
        }, Ia = function(a) {
            (null == a || "undefined" == typeof a) && alert("Please disable your pop-up blocker and try again.")
        }, Ja = function(a) {
            a = "object" == typeof a ? a : {}, N = $.extend({}, d, a), N.elementParameters = $.extend({}, d.elementParameters, N.elementParameters), N.textParameters = $.extend({}, d.textParameters, N.textParameters), N.imageParameters = $.extend({}, d.imageParameters, N.imageParameters), N.customTextParameters = $.extend({}, d.customTextParameters, N.customTextParameters), N.customImageParameters = $.extend({}, d.customImageParameters, N.customImageParameters), N.customAdds = $.extend({}, d.customAdds, N.customAdds), x.setStageDimensions(N.width, N.stageHeight), Ka(N)
        }, Ka = function(a) {
            a = "object" == typeof a ? a : {}, k.find(".fpd-add-image").toggle(Boolean(a.customAdds.uploads)), k.find(".fpd-add-text").toggle(Boolean(a.customAdds.texts)), k.find(".fpd-add-facebook-photo").toggle(Boolean(a.customAdds.facebook) && La(d.facebookAppId)), k.find(".fpd-add-instagram-photo").toggle(Boolean(a.customAdds.instagram) && La(d.instagramClientId)), k.find(".fpd-add-design").toggle(Boolean(a.customAdds.designs) && k.find(".fpd-add-design-wrapper .fpd-item").size() > 0);
            var b = k.find(".fpd-choose-add > .fpd-btn-raised").filter(function() {
                return "none" != $(this).css("display")
            });
            b.size() > 0 ? g.find('[data-context="adds"]').css("display", "inline-block") : g.find('[data-context="adds"]').css("display", "none")
        }, La = function(a) {
            return void 0 === a || a === !1 || 0 == a.length ? !1 : !0
        }, Ma = function() {
            return d.tooltips ? void $(".fpd-tooltip").each(function(a, b) {
                var c = $(b);
                c.tooltipster(c.hasClass("tooltipstered") ? "reposition" : {
                    offsetY: 0,
                    position: "bottom",
                    theme: ".fpd-tooltip-theme",
                    touchDevices: !1
                })
            }) : !1
        }, Na = function(a) {
            k.find(".fpd-dialog-title").text(a)
        }, Oa = function(a, b, c, e, f, h) {
            g.find('[data-context="layers"]').css("display", "inline-block");
            var i = "<i></i>";
            c && (i = '<i class="fpd-icon-reorder"></i>');
            var j = k.find(".fpd-content-layers .fpd-list");
            if (j.append('<div class="fpd-list-row" id="' + a + '"><div class="fpd-cell-0">' + i + '</div><div class="fpd-cell-1">' + b + '</div><div class="fpd-cell-2"></div></div>'), f) j.find(".fpd-list-row:last").addClass("fpd-add-layer").find(".fpd-cell-2").append('<span><i class="fpd-icon-add"></i></span>');
            else {
                var l = h ? "fpd-icon-locked" : "fpd-icon-unlocked",
                    m = h ? d.labels.unlock : d.labels.lock;
                j.find(".fpd-list-row:last .fpd-cell-2").append('<span class="fpd-lock-element fpd-tooltip" title="' + m + '"><i class="' + l + '"></i></span>'), e && j.find(".fpd-list-row:last .fpd-lock-element").after('<span class="fpd-remove-element fpd-tooltip" title="' + d.labels.remove + '"><i class="fpd-icon-remove"></i></span>'), j.find(".fpd-list-row:last ").addClass(h ? "fpd-locked" : "").children("div:lt(2)").css("opacity", h ? .2 : 1).css("pointer-events", h ? "none" : "visible")
            }
            j.sortable("refresh"), Ma()
        }, Pa = function(a) {
            for (var b = r.getObjects(), c = 0; c < b.length; ++c)
                if (b[c].params.uploadZone && b[c].title == a) return b[c]
        }, Qa = function(a, b, c) {
            c = "undefined" != typeof c ? c : null, a.parents(".fpd-list-row").toggleClass("fpd-hidden", !b);
            var d = a.parents(".fpd-list-row").prevAll(".fpd-head-options:first");
            d.nextUntil(".fpd-head-options", ".fpd-list-row:not(.fpd-hidden)").size() > 0 && d.removeClass("fpd-hidden"), null !== c && (a.hasClass("fpd-slider") ? a.slider("value", c) : "undefined" != typeof a.attr("value") && a.attr("value") !== !1 && a.val(c).change())
        }, Ra = function() {
            if (M = g.outerWidth() < d.width ? g.outerWidth() / d.width : 1, M = Number(M.toFixed(2)), M = M > 1 ? 1 : M, r.setDimensions({
                width: g.width(),
                height: d.stageHeight * M
            }), j.height(d.stageHeight * M), Ga(M), r.renderAll().calcOffset(), k.hasClass("fpd-left") || k.hasClass("fpd-right")) {
                var a = k.hasClass("fpd-left") ? g.offset().left + 50 : g.width() + g.offset().left - k.width() - 50;
                k.css({
                    left: a,
                    top: i.offset().top + .5 * i.height() - .5 * k.height()
                })
            }
            y.width() < 568 ? k.addClass("fpd-mobile").css("top", g.offset().top + g.height() + 10) : k.removeClass("fpd-mobile").css("top", i.offset().top + 10)
        }, Sa = function(a) {
            for (var b = r.getObjects(), c = 0; c < b.length; ++c)
                if (b[c].id == a) return b[c];
            return !1
        }, Ta = function() {
            $container = $(".sp-container"), $container.find(".sp-choose").addClass("fpd-secondary-bg-color fpd-secondary-text-color").html('<i class="fpd-icon-done"></i>'), $container.find(".sp-cancel").html('<i class="fpd-icon-close"></i>')
        }, Ua = function(a) {
            switch (a) {
                case "grayscale":
                    return new fabric.Image.filters.Grayscale;
                case "sepia":
                    return new fabric.Image.filters.Sepia;
                case "sepia2":
                    return new fabric.Image.filters.Sepia2
            }
            return null
        }, Va = function() {
            g.find(".fpd-undo, .fpd-redo").addClass("fpd-disabled"), S = [], T = []
        }, Wa = function() {
            if (!K) return !1;
            var a = K.params;
            void 0 !== a.opacity && k.find(".fpd-opacity-slider").slider("value", a.opacity), void 0 !== a.scale && k.find(".fpd-scale-slider").slider("value", a.scale), void 0 !== a.degree && k.find(".fpd-angle-slider").slider("value", a.degree), void 0 !== a.text && (k.find(".fpd-content-layers .fpd-list").children('[id="' + K.id + '"]').children(".fpd-cell-1").text(a.text), k.find(".fpd-change-text").val(a.text).change()), void 0 !== a.font && k.find(".fpd-fonts-dropdown").val(a.font).next(".select2").find(".select2-selection__rendered").text(a.font), void 0 !== a.lineHeight && k.find(".fpd-line-height-slider").slider("value", a.lineHeight), void 0 !== a.textAlign && k.find(".fpd-set-alignment").children(".fpd-btn").removeClass("fpd-checked").filter(".fpd-text-align-" + a.textAlign).addClass("fpd-checked"), void 0 !== a.fontWeight && k.find(".fpd-text-style-bold").toggleClass("fpd-checked", "bold" == a.fontWeight), void 0 !== a.fontStyle && k.find(".fpd-text-style-italic").toggleClass("fpd-checked", "italic" == a.fontStyle), void 0 !== a.textDecoration && k.find(".fpd-text-style-underline").toggleClass("fpd-checked", "underline" == a.textDecoration), a.curved && (a.curveRadius && k.find(".fpd-curved-text-radius-slider").slider("value", a.curveRadius), a.curveSpacing && k.find(".fpd-curved-text-spacing-slider").slider("value", a.curveSpacing), void 0 !== a.curveReverse && k.find(".fpd-curved-text-reverse-switcher").toggleClass("fpd-checked", a.curveReverse))
        }, Xa = function(a) {
            if (null == V || 0 == V.size()) return !1;
            for (var b = V.find(".fpd-grid"), c = b.children(".fpd-item.fpd-hidden:first"), d = 0, e = a ? 10 : 0;
                (e > d || b.height() - 10 < b.parents(".fpd-content-main").height()) && c.size() > 0;) {
                var f = c.children("picture");
                c.removeClass("fpd-hidden"), Za(f, f.data("img")), c = c.next(".fpd-item.fpd-hidden"), d++
            }
        }, Ya = function() {
            var a = k.removeClass("fpd-columns-" + k.data("columns")).width(),
                b = 3;
            a > 199 && (b = 1), a > 259 && (b = 2), a > 349 && (b = 3), a > 459 && (b = 4), a > 559 && (b = 5), k.addClass("fpd-columns-" + b).data("columns", b)
        }, Za = function(a, b) {
            a.addClass("fpd-on-loading");
            var c = new Image;
            c.src = b, c.onload = function() {
                a.attr("data-img", "").removeClass("fpd-on-loading").fadeOut(0).stop().fadeIn(200).css("background-image", 'url("' + this.src + '")')
            }
        }, $a = function(a) {
            var b = k.find(".fpd-content-layers .fpd-list-row").filter('[id="' + a + '"]');
            return 0 === b.size() ? null : b
        };
    FancyProductDesigner.prototype.getBoundingBoxCoords = function(a) {
        var b = a.params;
        if (b.boundingBox || b.uploadZone) {
            if ("object" == typeof b.boundingBox) return {
                left: b.boundingBox.x,
                top: b.boundingBox.y,
                width: b.boundingBox.width,
                height: b.boundingBox.height
            };
            for (var c = r.getObjects(), d = 0; d < c.length; ++d) {
                var e = c[d];
                if (b.boundingBox == e.title) {
                    var f = e.getBoundingRect();
                    return {
                        left: f.left / M,
                        top: f.top / M,
                        width: f.width / M,
                        height: f.height / M
                    }
                }
            }
        }
        return !1
    }, FancyProductDesigner.prototype.getFabricJSON = function() {
        x.deselectElement();
        var a = r.toJSON(["viewIndex"]);
        return a.width = r.width, a.height = r.height, a
    }, FancyProductDesigner.prototype.getPrice = function() {
        return L
    }, FancyProductDesigner.prototype.getProduct = function(a) {
        a = "undefined" != typeof a ? a : !1, x.deselectElement(), x.resetZoom();
        for (var b = r.getObjects(), c = 0; c < b.length; ++c) {
            var e = b[c];
            if (e.isOut) return alert('"' + e.title + '":' + d.labels.outOfContainmentAlert), !1
        }
        for (var f = [], c = 0; c < J.length; ++c) {
            var g = J[c];
            f.push({
                title: g.title,
                thumbnail: g.thumbnail,
                elements: [],
                options: g.options
            })
        }
        for (var c = 0; c < b.length; ++c) {
            var e = b[c],
                h = {
                    title: e.title,
                    source: e.source,
                    parameters: e.params,
                    type: "i-text" == e.type || "curvedText" == e.type ? "text" : "image"
                };
            void 0 == e.clipFor && (a ? e.isEditable && f[e.viewIndex].elements.push(h) : f[e.viewIndex].elements.push(h))
        }
        return f
    }, FancyProductDesigner.prototype.getResponsiveScale = function() {
        return M
    }, FancyProductDesigner.prototype.getViewsDataURL = function(a, b, c) {
        a = "undefined" != typeof a ? a : "png", b = "undefined" != typeof b ? b : "transparent", c = "undefined" != typeof c ? c : 1, x.deselectElement(), x.resetZoom();
        var e = [],
            f = r.getWidth(),
            g = r.getHeight(),
            h = M;
        return r.setDimensions({
            width: d.width,
            height: d.stageHeight
        }).setBackgroundColor(b, function() {
            M = 1;
            for (var b = Ga(1), d = 0; G > d; ++d) {
                for (var i = 0; i < b.length; ++i) {
                    var j = b[i];
                    j.visible = j.viewIndex == d
                }
                try {
                    e.push(r.toDataURL({
                        format: a,
                        multiplier: c
                    }))
                } catch (k) {
                    alert("Error: Please be sure that the images are hosted under the same domain and protocol, in which you are using the product designer!")
                }
            }
            for (var d = 0; d < b.length; ++d) {
                var j = b[d];
                j.visible = j.viewIndex == I
            }
            M = h, Ga(M), r.renderAll(), r.setDimensions({
                width: f,
                height: g
            }).setBackgroundColor("transparent").renderAll()
        }), e
    }, FancyProductDesigner.prototype.getViewSVG = function() {
        x.deselectElement(), x.resetZoom();
        var a = r.getWidth(),
            b = r.getHeight(),
            c = M;
        r.setDimensions({
            width: d.width,
            height: d.stageHeight
        }), M = 1, Ga(1);
        for (var e = 0; e < r.getObjects().length; ++e) {
            var f = r.getObjects()[e];
            "path-group" == f.type && (f.left = 1 * f.params.x - .5 * f.getWidth(), f.top = 1 * f.params.y - .5 * f.getHeight(), f.setCoords())
        }
        var g = r.toSVG(),
            h = $(g);
        h.children("rect").remove(), h.children("g").children('[style*="visibility: hidden"]').parent("g").remove(), g = $("<div>").append(h.clone()).html().replace(/(?:\r\n|\r|\n)/g, "");
        for (var e = 0; e < r.getObjects().length; ++e) {
            var f = r.getObjects()[e];
            "path-group" == f.type && (f.left = f.params.x * M, f.top = f.params.y * M, f.setCoords())
        }
        return M = c, Ga(M), r.setDimensions({
            width: a,
            height: b
        }).renderAll(), g
    }, FancyProductDesigner.prototype.getViewsSVG = function() {
        x.deselectElement(), x.resetZoom();
        var a = [],
            b = r.getWidth(),
            c = r.getHeight(),
            e = M;
        r.setDimensions({
            width: d.width,
            height: d.stageHeight
        }), M = 1;
        for (var f = Ga(1), g = 0; G > g; ++g) {
            for (var h = 0; h < f.length; ++h) {
                var i = f[h];
                i.visible = i.viewIndex == g, "path-group" == i.type && (i.left = 1 * i.params.x - .5 * i.getWidth(), i.top = 1 * i.params.y - .5 * i.getHeight(), i.setCoords())
            }
            var j = r.toSVG(),
                k = $(j);
            k.children("rect").remove(), k.children("g").children('[style*="visibility: hidden"]').parent("g").remove(), j = $("<div>").append(k.clone()).html().replace(/(?:\r\n|\r|\n)/g, ""), a.push(j)
        }
        for (var g = 0; g < f.length; ++g) {
            var i = f[g];
            i.visible = i.viewIndex == I, "path-group" == i.type && (i.left = i.params.x * M, i.top = i.params.y * M, i.setCoords())
        }
        return M = e, Ga(M), r.setDimensions({
            width: b,
            height: c
        }).renderAll(), a
    }, FancyProductDesigner.prototype.getProductDataURL = function(a, b, c) {
        a = "undefined" != typeof a ? a : "png", b = "undefined" != typeof b ? b : "transparent", c = "undefined" != typeof c ? c : 1, x.deselectElement(), x.resetZoom(), x.selectView(0);
        var e, f = r.getWidth(),
            g = r.getHeight(),
            h = M;
        return r.setBackgroundColor(b, function() {
            r.setDimensions({
                width: d.width,
                height: d.stageHeight * G
            }), M = 1;
            for (var b = Ga(1), i = 0; i < b.length; ++i) {
                var j = b[i];
                j.visible = !0, j.top = j.top + j.viewIndex * d.stageHeight
            }
            try {
                e = r.toDataURL({
                    format: a,
                    multiplier: c
                })
            } catch (k) {
                alert("Error: Please be sure that the images are hosted under the same domain and protocol, in which you are using the product designer!")
            }
            for (var i = 0; i < b.length; ++i) {
                var j = b[i];
                j.visible = 0 == j.viewIndex, j.top = j.top - j.viewIndex * d.stageHeight
            }
            M = h, Ga(M), r.setDimensions({
                width: f,
                height: g
            }).setBackgroundColor("transparent").renderAll()
        }), e
    }, FancyProductDesigner.prototype.getProductsLength = function() {
        return k.find(".fpd-content-products .fpd-item").size()
    }, FancyProductDesigner.prototype.getView = function() {
        return J[I]
    }, FancyProductDesigner.prototype.getViewDataURL = function(a, b, c) {
        a = "undefined" != typeof a ? a : "png", b = "undefined" != typeof b ? b : "transparent", c = "undefined" != typeof c ? c : 1, x.deselectElement(), x.resetZoom();
        var e = "",
            f = r.getWidth(),
            g = r.getHeight(),
            h = M;
        return r.setDimensions({
            width: d.width,
            height: d.stageHeight
        }).setBackgroundColor(b, function() {
            M = 1, Ga(1);
            try {
                e = r.toDataURL({
                    format: a,
                    multiplier: c
                })
            } catch (b) {
                return alert("Error: Please be sure that the images are hosted under the same domain and protocol, in which you are using the product designer!"), !1
            }
            M = h, Ga(M), r.setDimensions({
                width: f,
                height: g
            }).setBackgroundColor("transparent").renderAll()
        }), e.length ? e : !1
    }, FancyProductDesigner.prototype.getViewIndex = function() {
        return I
    }, FancyProductDesigner.prototype.getStage = function() {
        return r
    }, FancyProductDesigner.prototype.getCustomElements = function() {
        for (var a = r.getObjects(), b = [], c = 0; c < a.length; ++c) {
            var d = a[c];
            d.params && d.params.isCustom && b.push({
                element: d,
                parameters: d.params
            })
        }
        return b
    }, FancyProductDesigner.prototype.getScalingByDimesions = function(a, b, c, d) {
        var e = 1;
        return a > b ? (a > c && (e = c / a), e * b > d && (e = d / b)) : (b > d && (e = d / b), e * a > c && (e = c / a)), e
    }, FancyProductDesigner.prototype.getViewsOptions = function() {
        for (var a = [], b = 0; b < J.length; ++b) a.push(J[b].options ? J[b].options : {});
        return a
    }, FancyProductDesigner.prototype.addProduct = function(a, b) {
        null === A || A === !1 ? Aa(a) : (b = "undefined" == typeof b ? A.val() : b, void 0 == B[b] && (B[b] = new Array, A.append('<option value="' + b + '">' + b + "</option>")), B[b].push(a), A.val() == b && Aa(a))
    }, FancyProductDesigner.prototype.loadProduct = function(a) {
        function b() {
            if (G < J.length) x.addView(J[G]);
            else {
                g.off("viewCreate", b), g.trigger("productCreate", [J]);
                for (var a = r.getObjects(), c = 0; c < a.length; ++c) {
                    var d = a[c];
                    d.viewIndex == I && d.params && d.params.autoSelect && (r.setActiveObject(d), d.setCoords())
                }
                U = !0, k.removeClass("fpd-hidden")
            }
        }
        if (q.is(":visible")) return !1;
        if (U = !1, k.addClass("fpd-hidden"), d.replaceInitialElements) {
            R = new Array;
            for (var c = r.getObjects(), e = 0; e < c.length; ++e) {
                var f = c[e];
                if ("rect" != f.type && !f.params.isInitial) {
                    var h = {
                        type: "i-text" == f.type ? "text" : "image",
                        source: f.source,
                        title: f.title,
                        parameters: f.params
                    };
                    void 0 == R[f.viewIndex] ? R[f.viewIndex] = new Array(h) : R[f.viewIndex].push(h)
                }
            }
        }
        x.clear(), J = a;
        var i = '<div class="fpd-views-selection fpd-grid-contain fpd-clearfix fpd-' + d.viewSelectionPosition + " " + (d.viewSelectionFloated ? "fpd-float-items" : "") + '"></div>';
        "outside" == d.viewSelectionPosition ? g.after(i) : j.append(i), g.on("viewCreate", b), x.addView(J[0]), x.selectView(0)
    }, FancyProductDesigner.prototype.selectProduct = function(a) {
        if (a == H) return !1;
        H = a, 0 > a ? H = 0 : a > x.getProductsLength() - 1 && (H = x.getProductsLength() - 1);
        var b = k.find(".fpd-content-products .fpd-item").eq(H).data("views");
        x.loadProduct(b)
    }, FancyProductDesigner.prototype.selectView = function(a) {
        I = a, 0 > a ? I = 0 : a > o.children().size() - 1 && (I = o.children().size() - 1), x.closeDialog(), o.children("div").removeClass("fpd-view-active").eq(a).addClass("fpd-view-active"), x.deselectElement();
        for (var b = (k.find(".fpd-content-layers .fpd-list").empty(), r.getObjects()), c = 0; c < b.length; ++c) {
            var d = b[c];
            d.visible = d.viewIndex == I, d.viewIndex == I && d.isEditable && Oa(d.id, d.title, d.params.zChangeable, d.params.removable, d.params.uploadZone, !d.evented)
        }
        r.renderAll(), Ja(J[I].options)
    }, FancyProductDesigner.prototype.removeProduct = function(a) {
        0 > a ? a = 0 : a > x.getProductsLength() - 1 && (a = x.getProductsLength() - 1), k.find(".fpd-content-products .fpd-grid > .fpd-item").eq(a).remove(), a == H && (x.clear(), H = -1)
    }, FancyProductDesigner.prototype.addView = function(a) {
        G++, o = $(".fpd-views-selection"), o.append('<div class="fpd-shadow-1 fpd-item fpd-tooltip" title="' + a.title + '"><picture style="background-image: url(' + a.thumbnail + ');"></picture></div>').children("div:last").click(function(a) {
            a.preventDefault(), x.selectView(o.children("div").index($(this)))
        });
        var b = $.merge([], a.elements),
            c = R[G - 1] ? R[G - 1] : new Array,
            d = $.merge(b, c);
        ka(a.title, d), Ma(), G > 1 ? o.show() : o.hide()
    }, FancyProductDesigner.prototype.addElement = function(a, b, c, e, f) {
        if (e = "undefined" != typeof e ? e : {}, f = "undefined" != typeof f ? f : I, x.deselectElement(), "object" != typeof e) return alert("The element " + c + " does not have a valid JSON object as parameters! Please check the syntax, maybe you set quotes wrong."), !1;
        e = "text" == a || "i-text" == a || "curvedText" == a ? $.extend({}, d.elementParameters, d.textParameters, e) : $.extend({}, d.elementParameters, d.imageParameters, e), e.source = b;
        var h = !1,
            i = null;
        if (e.colors && "string" == typeof e.colors)
            if (0 == e.colors.indexOf("#")) {
                var j = e.colors.replace(/\s+/g, "").split(",");
                e.colors = j
            } else if (G > 1)
            for (var k = r.getObjects(), l = 0; l < k.length; ++l) {
                var m = k[l];
                0 == m.viewIndex && e.colors == m.title && null == i && (i = m, h = !0)
            }
        if ("text" == a || "i-text" == a || "curvedText" == a) {
            var n = e.colors[0] ? e.colors[0] : "#000000";
            e.currentColor = e.currentColor ? e.currentColor : n
        }
        var o = {
            source: b,
            title: c,
            id: String((new Date).getTime()),
            visible: f == I,
            viewIndex: f,
            lockUniScaling: !0
        };
        if (d.editorMode ? e.removable = e.resizable = e.rotatable = e.zChangeable = !0 : $.extend(o, {
            selectable: !1,
            lockRotation: !0,
            lockScalingX: !0,
            lockScalingY: !0,
            lockMovementX: !0,
            lockMovementY: !0,
            hasControls: !1,
            evented: !1
        }), "image" == a || "path" == a) {
            q.show();
            var p = function(a, b) {
                a.width * b.scale, a.height * b.scale;
                $.extend(o, {
                    params: b,
                    originParams: $.extend({}, b),
                    crossOrigin: "anonymous"
                }), a.set(o), h && (i.colorControlFor ? i.colorControlFor.push(a) : (i.colorControlFor = [], i.colorControlFor.push(a))), r.add(a), q.hide(), x.setElementParameters(a, a.params), g.trigger("elementAdded", [a])
            }, s = b.split("."); - 1 != $.inArray("svg", s) ? fabric.loadSVGFromURL(b, function(a, b) {
                var c = fabric.util.groupSVGElements(a, b);
                if (!e.currentColor) {
                    e.colors = [];
                    for (var d = 0; d < a.length; ++d) {
                        var f = tinycolor(a[d].fill);
                        e.colors.push(f.toHexString())
                    }
                    e.currentColor = e.colors
                }
                p(c, e)
            }) : new fabric.Image.fromURL(b, function(a) {
                p(a, e)
            })
        } else {
            if ("text" != a && "i-text" != a && "curvedText" != a) return alert("Sorry. This type of element is not allowed!"), !1;
            if (e.text = e.text ? e.text : e.source,
                e.font = e.font ? e.font : d.fonts[0], void 0 == e.font && (e.font = "Arial"), $.extend(o, {
                    fontSize: e.textSize,
                    fontFamily: e.font,
                    fontStyle: e.fontStyle,
                    fontWeight: e.fontWeight,
                    textAlign: e.textAlign,
                    textBackgroundColor: e.textBackgroundColor,
                    lineHeight: e.lineHeight,
                    textDecoration: e.textDecoration,
                    fill: e.currentColor,
                    editable: e.editable,
                    spacing: e.curveSpacing,
                    radius: e.curveRadius,
                    reverse: e.curveReverse,
                    params: e,
                    originParams: $.extend({}, e)
                }), e.curved) var t = new fabric.CurvedText(e.text.replace(/\\n/g, "\n"), o);
            else var t = new fabric.IText(e.text.replace(/\\n/g, "\n"), o);
            r.add(t), x.setElementParameters(t, t.params), va(e.font), g.trigger("elementAdded", [t])
        }
    }, FancyProductDesigner.prototype.addDesign = function(a, b, c, d, e) {
        c = "undefined" != typeof c ? c : {}, e = "undefined" == typeof e ? a : e, null === C || C === !1 ? Ba({
            source: a,
            title: b,
            parameters: c,
            thumbnail: e
        }) : (d = "undefined" == typeof d ? C.val() : d, void 0 == D[d] && (D[d] = new Array, C.append('<option value="' + d + '">' + d + "</option>")), D[d].push({
            source: a,
            title: b,
            parameters: c,
            thumbnail: e
        }), C.val() == d && Ba({
            source: a,
            title: b,
            parameters: c,
            thumbnail: e
        }))
    }, FancyProductDesigner.prototype.addCustomImage = function(a, b) {
        var c = (k.find(".fpd-input-image"), new Image);
        c.src = a, q.show(), c.onload = function() {
            var c = this.height,
                e = this.width;
            if (e > N.customImageParameters.maxW || e < N.customImageParameters.minW || c > N.customImageParameters.maxH || c < N.customImageParameters.minH) return q.hide(), alert(d.labels.uploadedDesignSizeAlert), !1;
            var f = N.customImageParameters;
            f.scale = x.getScalingByDimesions(e, c, N.customImageParameters.resizeToW, N.customImageParameters.resizeToH), f.isCustom = !0, x.addElement("image", a, b, f), x.addDesign(a, b, f, d.labels.myUploadedImgCat)
        }, c.onerror = function() {
            alert("Image could not be loaded!")
        }
    }, FancyProductDesigner.prototype.print = function() {
        for (var a = x.getViewsDataURL(), b = new Array, c = 0, d = 0; d < a.length; ++d) {
            var e = new Image;
            e.src = a[d], e.onload = function() {
                if (b.push(this), c++, c == a.length) {
                    var d = window.open("", "", "width=" + b[0].width + ",height=" + b[0].height * a.length + ",location=no,menubar=no,scrollbars=yes,status=no,toolbar=no");
                    Ia(d), d.document.title = "Print Image";
                    for (var e = 0; e < b.length; ++e) $(d.document.body).append('<img src="' + b[e].src + '" />');
                    setTimeout(function() {
                        d.print()
                    }, 1e3)
                }
            }
        }
    }, FancyProductDesigner.prototype.createImage = function(a, b) {
        "undefined" == typeof a && (a = !0), "undefined" == typeof b && (b = !1);
        var c = x.getProductDataURL(),
            d = new Image;
        return d.src = c, d.onload = function() {
            if (a) {
                var c = window.open("", "", "width=" + this.width + ",height=" + this.height + ",location=no,menubar=no,scrollbars=yes,status=no,toolbar=no");
                Ia(c), c.document.title = "Product Image", $(c.document.body).append('<img src="' + this.src + '" download="product.png" />'), b && (window.location.href = c.document.getElementsByTagName("img")[0].src.replace("image/png", "image/octet-stream"))
            }
        }, d
    }, FancyProductDesigner.prototype.clear = function() {
        x.deselectElement(), x.resetZoom(), o && o.remove(), k.hide().find(".fpd-content-layers .fpd-list").empty(), r.clear(), G = I = L = 0, J = K = null, g.trigger("stageClear"), W = !0
    }, FancyProductDesigner.prototype.deselectElement = function(a) {
        a = "undefined" == typeof a ? !0 : a, Va(), m.removeClass("fpd-colorpicker-group").empty(), n.hide(), E && (E.remove(), E = null), a && r.discardActiveObject(), k.find(".fpd-content-edit").is(":visible") && x.closeDialog(), k.find(".fpd-content-edit .fpd-list-row").addClass("fpd-hidden"), K = null, p && p.find("i").text(""), r.renderAll().calcOffset()
    }, FancyProductDesigner.prototype.removeElement = function(a) {
        if ("string" == typeof a && (a = x.getElementByTitle(a)), 0 == a.params.price || a.params.uploadZone || (L -= a.params.price, g.trigger("priceChange", [a.params.price, L])), k.find(".fpd-content-layers .fpd-list").children('[id="' + a.id + '"]').remove(), r.remove(a), a.params.hasUploadZone) {
            for (var b = r.getObjects(), c = !0, d = 0; d < b.length; ++d) {
                var e = b[d];
                if (e.visible && e.params.replace == a.params.replace) {
                    c = !1;
                    break
                }
            }
            var f = Pa(a.params.replace);
            f.opacity = c ? 1 : 0
        }
        g.trigger("elementRemove", [a]), x.deselectElement()
    }, FancyProductDesigner.prototype.getElementByTitle = function(a) {
        for (var b = r.getObjects(), c = 0; c < b.length; ++c)
            if (b[c].title == a) return b[c]
    }, FancyProductDesigner.prototype.setZoom = function(a) {
        x.deselectElement();
        var b = new fabric.Point(.5 * r.getWidth(), .5 * r.getHeight());
        r.zoomToPoint(b, a), 1 == a && x.resetZoom()
    }, FancyProductDesigner.prototype.resetZoom = function() {
        x.deselectElement(), r.zoomToPoint(new fabric.Point(0, 0), 1), r.absolutePan(new fabric.Point(0, 0))
    }, FancyProductDesigner.prototype.setStageDimensions = function(a, b) {
        d.width = a, d.stageHeight = b, g.width(a), j.height(b * M), r.setDimensions({
            width: g.width(),
            height: d.stageHeight * M
        }).calcOffset().renderAll(), Ra()
    }, FancyProductDesigner.prototype.showMessage = function(a) {
        var b;
        b = z.children(".fpd-snackbar-internal").size() > 0 ? z.children(".fpd-snackbar") : z.append('<div class="fpd-snackbar-internal fpd-snackbar fpd-shadow-1"><p></p></div>').children(".fpd-snackbar-internal"), b.removeClass("fpd-show-up").children("p").html(a).parent().addClass("fpd-show-up"), setTimeout(function() {
            b.removeClass("fpd-show-up")
        }, 3e3)
    }, FancyProductDesigner.prototype.callDialogContent = function(a, b, c, e) {
        c = "undefined" != typeof c ? c : null, e = "undefined" != typeof e ? e : !0, e && x.deselectElement(), k.find(".fpd-content-sub.fpd-show").removeClass("fpd-show"), k.find(".fpd-content-back").removeClass("fpd-show");
        var f = k.find(".fpd-dialog-content .fpd-content-" + a);
        if (f.is(":hidden") && (f.siblings("div").stop().hide(), f.stop().fadeIn(300)), k.show(), "products" == a && d.lazyLoad && (V = f, Xa(!1)), c) {
            var g = k.find('.fpd-content-sub[data-subContext="' + c + '"]').addClass("fpd-show");
            k.find(".fpd-content-back").data("parentTitle", k.find(".fpd-dialog-title").text()).addClass("fpd-show"), V = null, "designs" == c && d.lazyLoad && (V = g, Xa(!1))
        }
        Na(b)
    }, FancyProductDesigner.prototype.setUploadZone = function(a) {
        F = a, x.closeDialog()
    }, FancyProductDesigner.prototype.closeDialog = function() {
        k.hide(), m.find("input").spectrum("hide"), V = null, F = null
    }, FancyProductDesigner.prototype.setClippingRect = function(a, b) {
        "string" == typeof a && (a = x.getElementByTitle(a)), a.clippingRect = b, r.renderAll()
    }, FancyProductDesigner.prototype.setElementParameters = function(a, b) {
        if (void 0 === a || void 0 === b) return !1;
        if ("string" == typeof a && (a = x.getElementByTitle(a)), U) {
            var c = {};
            for (var e in b) c[e] = a.params[e];
            S.push({
                element: a,
                parameters: c
            })
        }
        if (F && "" != F) {
            b.z = -1;
            var f = x.getElementByTitle(F),
                h = f.getBoundingRect();
            $.extend(b, {
                boundingBox: F,
                scale: x.getScalingByDimesions(a.getWidth(), a.getHeight(), h.width / M - 1, h.height / M - 1),
                autoCenter: !0,
                removable: !0,
                zChangeable: !1,
                rotatable: f.params.rotatable,
                draggable: f.params.draggable,
                resizable: f.params.resizable,
                price: f.params.price,
                replace: F,
                hasUploadZone: !0
            }), f.opacity = 0
        }
        for (var i = r.getObjects(), j = 0; j < i.length; ++j) {
            var l = i[j];
            l.params && l.params.uploadZone && l.title == b.replace && (l.opacity = 0)
        }
        if (b.topped && (b.zChangeable = !1), ("object" == typeof b.colors || b.removable || b.draggable || b.resizable || b.rotatable || b.zChangeable || b.editable || b.patternable || b.uploadZone) && (a.isEditable = a.evented = !0, a.set("selectable", !0), a.viewIndex == I && 0 == k.find('.fpd-content-layers .fpd-list-row[id="' + a.id + '"]').size() && Oa(a.id, a.title, b.zChangeable, b.removable, b.uploadZone, !a.evented)), void 0 !== b.opacity && (a.set("opacity", b.opacity), a.params.curved && a.setFill(a.fill)), (!b.uploadZone || d.editorMode) && (b.draggable && (a.lockMovementX = a.lockMovementY = !1), b.rotatable && (a.lockRotation = !1), b.resizable && (a.lockScalingX = a.lockScalingY = !1), (b.resizable || b.rotatable || b.removable) && (a.hasControls = !0)), b.originX && a.setOriginX(b.originX), b.originY && a.setOriginY(b.originY), void 0 !== b.x && a.set("left", b.x), void 0 !== b.y && a.set("top", b.y), void 0 !== b.scale && (a.set("scaleX", b.scale), a.set("scaleY", b.scale)), void 0 !== b.degree && a.set("angle", b.degree), b.replace && "" != b.replace && a.viewIndex === I)
            for (var i = r.getObjects(), j = 0; j < i.length; ++j) {
                var l = i[j];
                if (void 0 != l.params && void 0 == l.clipFor && l.params.replace == b.replace && l.visible && a !== l) {
                    b.z = ya(l), b.x = l.params.x, b.y = l.params.y, b.autoCenter = !1, x.removeElement(l);
                    break
                }
            }
        if (b.autoCenter && qa(a), void 0 !== b.flipX && a.set("flipX", b.flipX), void 0 !== b.flipY && a.set("flipY", b.flipY), b.price && !b.uploadZone && (L += b.price, g.trigger("priceChange", [b.price, L])), void 0 !== b.currentColor && null == b.pattern && ma(a, b.currentColor), void 0 !== b.pattern && xa(a, b.pattern), b.filter) {
            a.filters = [];
            var m = Ua(b.filter);
            null != m && a.filters.push(m), a.applyFilters(function() {
                r.renderAll(), z.mouseup()
            })
        }
        if ((b.boundingBox && b.boundingBoxClipping || b.hasUploadZone) && Ea(a), b.z >= 0 && za(a, b.z), b.text) {
            var n = b.text;
            0 != a.params.maxLength && n.length > a.params.maxLength && (n = n.substr(0, a.params.maxLength), a.selectionStart = a.params.maxLength), b.text = a.title = n, a.setText(n)
        }
        void 0 !== b.font && (a.setFontFamily(b.font), va(b.font)), void 0 !== b.lineHeight && a.set("lineHeight", b.lineHeight), void 0 !== b.textAlign && a.set("textAlign", b.textAlign), void 0 !== b.fontWeight && a.set("fontWeight", b.fontWeight), void 0 !== b.fontStyle && a.set("fontStyle", b.fontStyle), void 0 !== b.textDecoration && a.set("textDecoration", b.textDecoration), a.params.curved && (b.curveRadius && a.set("radius", b.curveRadius), b.curveSpacing && a.set("spacing", b.curveSpacing), void 0 !== b.curveReverse && a.set("reverse", b.curveReverse)), b.autoSelect && a.isEditable && a.viewIndex == I && (r.setActiveObject(a), a.setCoords()), Ha(), b.topped && a.bringToFront();
        for (var e in b) a.params[e] = b[e];
        a.setCoords(), r.renderAll().calcOffset(), Wa(), la(a), ua(a), Ra()
    }
};
! function(a) {
    "use strict";
    jQuery.fn.fancyProductDesigner = function(b) {
        return this.each(function() {
            var c = a(this);
            if (!c.data("fancy-product-designer")) {
                var d = new FancyProductDesigner(this, b);
                c.data("fancy-product-designer", d)
            }
        });
    }, a.fn.fancyProductDesigner.defaults = {
        width: 900,
        stageHeight: 600,
        imageDownloadable: !0,
        saveAsPdf: !0,
        printable: !0,
        allowProductSaving: !0,
        tooltips: !0,
        editorMode: !1,
        viewSelectionPosition: "tr",
        viewSelectionFloated: !1,
        fonts: ["Arial", "Helvetica", "Times New Roman", "Verdana", "Geneva"],
        templatesDirectory: "templates/",
        phpDirectory: "php/",
        patterns: [],
        facebookAppId: "",
        instagramClientId: "",
        instagramRedirectUri: "",
        zoomStep: .2,
        maxZoom: 3,
        hexNames: {},
        selectedColor: "#000000",
        boundingBoxColor: "#005ede",
        outOfBoundaryColor: "#990000",
        paddingControl: 10,
        replaceInitialElements: !1,
        lazyLoad: !0,
        dialogBoxPositioning: "dynamic",
        elementParameters: {
            x: 1,
            y: 0,
            z: -1,
            opacity: 1,
            originX: "center",
            originY: "center",
            scale: 1,
            degree: 0,
            price: 0,
            colors: !1,
            currentColor: !1,
            removable: !1,
            draggable: !1,
            rotatable: !1,
            resizable: !1,
            zChangeable: !1,
            boundingBox: !1,
            autoCenter: !1,
            replace: "",
            boundingBoxClipping: !1,
            autoSelect: !1,
            topped: !1,
            flipX: !1,
            flipY: !1,
            colorPrices: { }
        },
        textParameters: {
            font: !1,
            textSize: 18,
            patternable: !1,
            editable: !0,
            lineHeight: 1,
            textAlign: "left",
            fontWeight: "normal",
            fontStyle: "normal",
            textDecoration: "normal",
            maxLength: 0,
            curved: !1,
            curvable: !1,
            curveSpacing: 10,
            curveRadius: 80,
            curveReverse: !1
        },
        imageParameters: {
            uploadZone: !1,
            filter: !1,
            filters: []
        },
        customImageParameters: {
            minW: 100,
            minH: 100,
            maxW: 1500,
            maxH: 1500,
            resizeToW: 300,
            resizeToH: 300
        },
        customTextParameters: {},
        customAdds: {
            designs: !0,
            uploads: !0,
            texts: !0,
            facebook: !0,
            instagram: !0
        },
        labels: {
            layersButton: "Manejar Capas",
            addsButton: "Agrega Tu logo o imagen",
            moreButton: "Actions",
            productsButton: "Change Products",
            downloadImage: "Download Image",
            print: "Imprimir",
            downLoadPDF: "Descargar PDF",
            saveProduct: "Guardar",
            loadProduct: "Cargar",
            undoButton: "Undo",
            redoButton: "Redo",
            resetProductButton: "Reset Product",
            zoomButton: "Zoom",
            panButton: "Pan",
            addImageButton: "Agrega Imagen desde el pc",
            addTextButton: "Agrega tu texto",
            enterText: "Enter your text",
            addFBButton: "Agrega Imagen de facebook",
            addInstaButton: "Agrega Imagen de instagram",
            addDesignButton: "Choose from Designs",
            fillOptions: "Fill Options",
            color: "Color",
            patterns: "Patterns",
            opacity: "Opacity",
            filter: "Filter",
            textOptions: "Text Options",
            changeText: "Change Text",
            typeface: "Typeface",
            lineHeight: "Line Height",
            textAlign: "Alignment",
            textAlignLeft: "Align Left",
            textAlignCenter: "Align Center",
            textAlignRight: "Align Right",
            textStyling: "Styling",
            bold: "Bold",
            italic: "Italic",
            underline: "Underline",
            curvedText: "Curved Text",
            curvedTextSpacing: "Spacing",
            curvedTextRadius: "Radius",
            curvedTextReverse: "Reverse",
            transform: "Transform",
            angle: "Angle",
            scale: "Scale",
            centerH: "Center Horizontal",
            centerV: "Center Vertical",
            flipHorizontal: "Flip Horizontal",
            flipVertical: "Flip Vertical",
            resetElement: "Reset Element",
            fbSelectAlbum: "Select an album",
            instaFeedButton: "My Feed",
            instaRecentImagesButton: "My Recent Images",
            editElement: "Edit Element",
            productSaved: "Product Saved!",
            lock: "Lock",
            unlock: "Unlock",
            remove: "Remove",
            outOfContainmentAlert: "Move it in his containment!",
            uploadedDesignSizeAlert: "Sorry! But the uploaded image size does not conform our indication of size.",
            initText: "Initializing product designer",
            myUploadedImgCat: "Your uploaded images",
            moveUp: "Move Up",
            moveDown: "Move Down"
        }
    };
}(jQuery);
