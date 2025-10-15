# CSS-Variablen für alle Themes - HTML-basiert optimiert

Optimierte CSS-Variablen-Blöcke für `body.axai-theme-[name]` basierend auf den tatsächlichen HTML-Klassen und Elementen.

---

## **1. DEFAULT Theme**

```css
:root {
    /* Container & Background */
    --axai-bg-color: #ffffff;
    --axai-border-color: #d1d5db;
    --axai-hover-bg-color: #f3f4f6;
    
    /* Text Colors */
    --axai-text-color: #222628;
    --axai-header-text-color: #222628;
    --axai-greeting-text-color: #94a3b8;
    --axai-timestamp-color: #9ca3af;
    --axai-bot-name-color: #9ca3af;
    
    /* Header Elements */
    --axai-header-border-color: rgb(233, 233, 233);
    --axai-header-button-color: rgba(71, 85, 105, 0.6);
    --axai-header-button-hover-bg: #f3f4f6;
    --axai-header-button-hover-color: rgba(71, 85, 105, 0.9);
    
    /* Message Bubbles */
    --axai-user-msg-bg: #3b82f6;
    --axai-user-msg-text: #ffffff;
    --axai-bot-msg-bg: #f3f4f6;
    --axai-bot-msg-text: #222628;
    
    /* Input Area */
    --axai-input-bg-color: #ffffff;
    --axai-input-text-color: #222628;
    --axai-input-border-color: rgba(34, 38, 40, 0.2);
    --axai-input-placeholder-color: rgba(30, 41, 59, 0.6);
    --axai-input-focus-border-color: #3b82f6;
    
    /* Buttons */
    --axai-button-color: #3b82f6;
    --axai-button-text-color: #ffffff;
    --axai-send-button-icon-color: rgba(34, 38, 40, 0.6);
    --axai-send-button-icon-hover-color: rgba(34, 38, 40, 0.9);
    
    /* Footer */
    --axai-footer-link-color: rgb(1, 25, 217);
    --axai-footer-button-color: rgb(122, 125, 126);
    
    /* Shadows */
    --axai-box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.25);
    --axai-button-hover-shadow: 0px 4px 14px rgba(0, 0, 0, 0.5);
}
```

---

## **2. LINUX TERMINAL Theme**

```css
body.axai-theme-linux {
    /* Container & Background */
    --axai-bg-color: #000000;
    --axai-border-color: #00ff00;
    --axai-hover-bg-color: #003300;
    
    /* Text Colors - Alle Terminal-Grün */
    --axai-text-color: #00ff00;
    --axai-header-text-color: #00ff00;
    --axai-greeting-text-color: #00ff00;
    --axai-timestamp-color: rgba(0, 255, 0, 0.7);
    --axai-bot-name-color: rgba(0, 255, 0, 0.8);
    
    /* Header Elements */
    --axai-header-border-color: rgba(0, 255, 0, 0.5);
    --axai-header-button-color: #00ff00;
    --axai-header-button-hover-bg: #003300;
    --axai-header-button-hover-color: #00ff00;
    
    /* Message Bubbles */
    --axai-user-msg-bg: #003300;
    --axai-user-msg-text: #00ff00;
    --axai-bot-msg-bg: #001100;
    --axai-bot-msg-text: #00ff00;
    
    /* Input Area */
    --axai-input-bg-color: #000000;
    --axai-input-text-color: #00ff00;
    --axai-input-border-color: #00ff00;
    --axai-input-placeholder-color: rgba(0, 255, 0, 0.5);
    --axai-input-focus-border-color: #00ff00;
    
    /* Buttons */
    --axai-button-color: #003300;
    --axai-button-text-color: #00ff00;
    --axai-send-button-icon-color: #026d02;
    --axai-send-button-icon-hover-color: #00ff00;
    
    /* Footer */
    --axai-footer-link-color: #00ff00;
    --axai-footer-button-color: rgba(0, 255, 0, 0.7);
    
    /* Shadows & Effects */
    --axai-box-shadow: 0px 0px 18px #00ff00;
    --axai-button-hover-shadow: 0px 0px 18px rgba(0, 255, 0, 0.5);
    --axai-text-shadow: 0 0 3px rgba(0, 255, 0, 0.5);
}
```

---

## **3. DARK MODE Theme**

```css
body.axai-theme-dark {
    /* Container & Background */
    --axai-bg-color: #1f2937;
    --axai-border-color: #4b5563;
    --axai-hover-bg-color: #4b5563;
    
    /* Text Colors */
    --axai-text-color: #f9fafb;
    --axai-header-text-color: #f9fafb;
    --axai-greeting-text-color: #9ca3af;
    --axai-timestamp-color: #6b7280;
    --axai-bot-name-color: #9ca3af;
    
    /* Header Elements */
    --axai-header-border-color: rgba(75, 85, 99, 0.5);
    --axai-header-button-color: rgba(249, 250, 251, 0.6);
    --axai-header-button-hover-bg: #4b5563;
    --axai-header-button-hover-color: #60a5fa;
    
    /* Message Bubbles */
    --axai-user-msg-bg: #60a5fa;
    --axai-user-msg-text: #1f2937;
    --axai-bot-msg-bg: #374151;
    --axai-bot-msg-text: #f9fafb;
    
    /* Input Area */
    --axai-input-bg-color: #374151;
    --axai-input-text-color: #f9fafb;
    --axai-input-border-color: #4b5563;
    --axai-input-placeholder-color: rgba(156, 163, 175, 0.6);
    --axai-input-focus-border-color: #60a5fa;
    
    /* Buttons */
    --axai-button-color: #60a5fa;
    --axai-button-text-color: #1f2937;
    --axai-send-button-icon-color: rgba(96, 165, 250, 0.6);
    --axai-send-button-icon-hover-color: rgba(96, 165, 250, 0.9);
    
    /* Footer */
    --axai-footer-link-color: #60a5fa;
    --axai-footer-button-color: #9ca3af;
    
    /* Shadows */
    --axai-box-shadow: 0px 0px 18px rgba(96, 165, 250, 0.3);
    --axai-button-hover-shadow: 0px 4px 14px rgba(96, 165, 250, 0.5);
}
```

---

## **4. OCEAN BLUE Theme**

```css
body.axai-theme-ocean {
    /* Container & Background */
    --axai-bg-color: #f0f9ff;
    --axai-border-color: #7dd3fc;
    --axai-hover-bg-color: #e0f2fe;
    
    /* Text Colors */
    --axai-text-color: #0c4a6e;
    --axai-header-text-color: #ffffff;
    --axai-greeting-text-color: rgba(12, 74, 110, 0.6);
    --axai-timestamp-color: rgba(3, 105, 161, 0.7);
    --axai-bot-name-color: #0369a1;
    
    /* Header Elements */
    --axai-header-bg-color: #0ea5e9;
    --axai-header-border-color: rgba(125, 211, 252, 0.5);
    --axai-header-button-color: rgba(255, 255, 255, 0.8);
    --axai-header-button-hover-bg: rgba(255, 255, 255, 0.2);
    --axai-header-button-hover-color: #ffffff;
    
    /* Message Bubbles */
    --axai-user-msg-bg: #0ea5e9;
    --axai-user-msg-text: #ffffff;
    --axai-bot-msg-bg: #e0f2fe;
    --axai-bot-msg-text: #0c4a6e;
    
    /* Input Area */
    --axai-input-bg-color: #ffffff;
    --axai-input-text-color: #0c4a6e;
    --axai-input-border-color: #7dd3fc;
    --axai-input-placeholder-color: rgba(12, 74, 110, 0.5);
    --axai-input-focus-border-color: #0ea5e9;
    
    /* Buttons */
    --axai-button-color: #0ea5e9;
    --axai-button-text-color: #ffffff;
    --axai-send-button-icon-color: rgba(14, 165, 233, 0.7);
    --axai-send-button-icon-hover-color: #0ea5e9;
    
    /* Footer */
    --axai-footer-link-color: #0ea5e9;
    --axai-footer-button-color: #0369a1;
    
    /* Shadows */
    --axai-box-shadow: 0px 0px 18px rgba(14, 165, 233, 0.3);
    --axai-button-hover-shadow: 0px 4px 14px rgba(14, 165, 233, 0.5);
}
```

---

## **5. FOREST GREEN Theme**

```css
body.axai-theme-forest {
    /* Container & Background */
    --axai-bg-color: #f0fdf4;
    --axai-border-color: #86efac;
    --axai-hover-bg-color: #dcfce7;
    
    /* Text Colors */
    --axai-text-color: #14532d;
    --axai-header-text-color: #ffffff;
    --axai-greeting-text-color: rgba(20, 83, 45, 0.6);
    --axai-timestamp-color: rgba(22, 101, 52, 0.7);
    --axai-bot-name-color: #166534;
    
    /* Header Elements */
    --axai-header-bg-color: #16a34a;
    --axai-header-border-color: rgba(134, 239, 172, 0.5);
    --axai-header-button-color: rgba(255, 255, 255, 0.8);
    --axai-header-button-hover-bg: rgba(255, 255, 255, 0.2);
    --axai-header-button-hover-color: #ffffff;
    
    /* Message Bubbles */
    --axai-user-msg-bg: #16a34a;
    --axai-user-msg-text: #ffffff;
    --axai-bot-msg-bg: #dcfce7;
    --axai-bot-msg-text: #14532d;
    
    /* Input Area */
    --axai-input-bg-color: #ffffff;
    --axai-input-text-color: #14532d;
    --axai-input-border-color: #86efac;
    --axai-input-placeholder-color: rgba(20, 83, 45, 0.5);
    --axai-input-focus-border-color: #16a34a;
    
    /* Buttons */
    --axai-button-color: #16a34a;
    --axai-button-text-color: #ffffff;
    --axai-send-button-icon-color: rgba(22, 163, 74, 0.7);
    --axai-send-button-icon-hover-color: #16a34a;
    
    /* Footer */
    --axai-footer-link-color: #16a34a;
    --axai-footer-button-color: #166534;
    
    /* Shadows */
    --axai-box-shadow: 0px 0px 18px rgba(22, 163, 74, 0.3);
    --axai-button-hover-shadow: 0px 4px 14px rgba(22, 163, 74, 0.5);
}
```

---

## **6. SUNSET ORANGE Theme**

```css
body.axai-theme-sunset {
    /* Container & Background */
    --axai-bg-color: #fef7ed;
    --axai-border-color: #fdba74;
    --axai-hover-bg-color: #ffedd5;
    
    /* Text Colors */
    --axai-text-color: #7c2d12;
    --axai-header-text-color: #ffffff;
    --axai-greeting-text-color: rgba(124, 45, 18, 0.6);
    --axai-timestamp-color: rgba(154, 52, 18, 0.7);
    --axai-bot-name-color: #9a3412;
    
    /* Header Elements */
    --axai-header-bg-color: #ea580c;
    --axai-header-border-color: rgba(253, 186, 116, 0.5);
    --axai-header-button-color: rgba(255, 255, 255, 0.8);
    --axai-header-button-hover-bg: rgba(255, 255, 255, 0.2);
    --axai-header-button-hover-color: #ffffff;
    
    /* Message Bubbles */
    --axai-user-msg-bg: #ea580c;
    --axai-user-msg-text: #ffffff;
    --axai-bot-msg-bg: #ffedd5;
    --axai-bot-msg-text: #7c2d12;
    
    /* Input Area */
    --axai-input-bg-color: #ffffff;
    --axai-input-text-color: #7c2d12;
    --axai-input-border-color: #fdba74;
    --axai-input-placeholder-color: rgba(124, 45, 18, 0.5);
    --axai-input-focus-border-color: #ea580c;
    
    /* Buttons */
    --axai-button-color: #ea580c;
    --axai-button-text-color: #ffffff;
    --axai-send-button-icon-color: rgba(234, 88, 12, 0.7);
    --axai-send-button-icon-hover-color: #ea580c;
    
    /* Footer */
    --axai-footer-link-color: #ea580c;
    --axai-footer-button-color: #9a3412;
    
    /* Shadows */
    --axai-box-shadow: 0px 0px 18px rgba(234, 88, 12, 0.3);
    --axai-button-hover-shadow: 0px 4px 14px rgba(234, 88, 12, 0.5);
}
```

---

## **7. ROYAL PURPLE Theme**

```css
body.axai-theme-royal {
    /* Container & Background */
    --axai-bg-color: #faf5ff;
    --axai-border-color: #c4b5fd;
    --axai-hover-bg-color: #f3e8ff;
    
    /* Text Colors */
    --axai-text-color: #4c1d95;
    --axai-header-text-color: #ffffff;
    --axai-greeting-text-color: rgba(76, 29, 149, 0.6);
    --axai-timestamp-color: rgba(91, 33, 182, 0.7);
    --axai-bot-name-color: #5b21b6;
    
    /* Header Elements */
    --axai-header-bg-color: #7c3aed;
    --axai-header-border-color: rgba(196, 181, 253, 0.5);
    --axai-header-button-color: rgba(255, 255, 255, 0.8);
    --axai-header-button-hover-bg: rgba(255, 255, 255, 0.2);
    --axai-header-button-hover-color: #ffffff;
    
    /* Message Bubbles */
    --axai-user-msg-bg: #7c3aed;
    --axai-user-msg-text: #ffffff;
    --axai-bot-msg-bg: #f3e8ff;
    --axai-bot-msg-text: #4c1d95;
    
    /* Input Area */
    --axai-input-bg-color: #ffffff;
    --axai-input-text-color: #4c1d95;
    --axai-input-border-color: #c4b5fd;
    --axai-input-placeholder-color: rgba(76, 29, 149, 0.5);
    --axai-input-focus-border-color: #7c3aed;
    
    /* Buttons */
    --axai-button-color: #7c3aed;
    --axai-button-text-color: #ffffff;
    --axai-send-button-icon-color: rgba(124, 58, 237, 0.7);
    --axai-send-button-icon-hover-color: #7c3aed;
    
    /* Footer */
    --axai-footer-link-color: #7c3aed;
    --axai-footer-button-color: #5b21b6;
    
    /* Shadows */
    --axai-box-shadow: 0px 0px 18px rgba(124, 58, 237, 0.3);
    --axai-button-hover-shadow: 0px 4px 14px rgba(124, 58, 237, 0.5);
}
```

---

## **8. MIDNIGHT Theme**

```css
body.axai-theme-midnight {
    /* Container & Background */
    --axai-bg-color: #0f172a;
    --axai-border-color: #334155;
    --axai-hover-bg-color: #334155;
    
    /* Text Colors */
    --axai-text-color: #f1f5f9;
    --axai-header-text-color: #f1f5f9;
    --axai-greeting-text-color: #94a3b8;
    --axai-timestamp-color: #64748b;
    --axai-bot-name-color: #94a3b8;
    
    /* Header Elements */
    --axai-header-bg-color: #0f172a;
    --axai-header-border-color: rgba(51, 65, 85, 0.5);
    --axai-header-button-color: rgba(241, 245, 249, 0.6);
    --axai-header-button-hover-bg: #334155;
    --axai-header-button-hover-color: #6366f1;
    
    /* Message Bubbles */
    --axai-user-msg-bg: #6366f1;
    --axai-user-msg-text: #ffffff;
    --axai-bot-msg-bg: #1e293b;
    --axai-bot-msg-text: #f1f5f9;
    
    /* Input Area */
    --axai-input-bg-color: #1e293b;
    --axai-input-text-color: #f1f5f9;
    --axai-input-border-color: #334155;
    --axai-input-placeholder-color: rgba(148, 163, 184, 0.6);
    --axai-input-focus-border-color: #6366f1;
    
    /* Buttons */
    --axai-button-color: #6366f1;
    --axai-button-text-color: #ffffff;
    --axai-send-button-icon-color: rgba(99, 102, 241, 0.7);
    --axai-send-button-icon-hover-color: #6366f1;
    
    /* Footer */
    --axai-footer-link-color: #6366f1;
    --axai-footer-button-color: #94a3b8;
    
    /* Shadows */
    --axai-box-shadow: 0px 0px 18px rgba(99, 102, 241, 0.3);
    --axai-button-hover-shadow: 0px 4px 14px rgba(99, 102, 241, 0.5);
}
```

---

## **9. COFFEE Theme**

```css
body.axai-theme-coffee {
    /* Container & Background */
    --axai-bg-color: #fef3c7;
    --axai-border-color: #d97706;
    --axai-hover-bg-color: #fde68a;
    
    /* Text Colors */
    --axai-text-color: #451a03;
    --axai-header-text-color: #ffffff;
    --axai-greeting-text-color: rgba(69, 26, 3, 0.6);
    --axai-timestamp-color: rgba(120, 53, 15, 0.7);
    --axai-bot-name-color: #78350f;
    
    /* Header Elements */
    --axai-header-bg-color: #92400e;
    --axai-header-border-color: rgba(217, 119, 6, 0.5);
    --axai-header-button-color: rgba(255, 255, 255, 0.8);
    --axai-header-button-hover-bg: rgba(255, 255, 255, 0.2);
    --axai-header-button-hover-color: #ffffff;
    
    /* Message Bubbles */
    --axai-user-msg-bg: #92400e;
    --axai-user-msg-text: #ffffff;
    --axai-bot-msg-bg: #fde68a;
    --axai-bot-msg-text: #451a03;
    
    /* Input Area */
    --axai-input-bg-color: #fef3c7;
    --axai-input-text-color: #451a03;
    --axai-input-border-color: #d97706;
    --axai-input-placeholder-color: rgba(69, 26, 3, 0.5);
    --axai-input-focus-border-color: #92400e;
    
    /* Buttons */
    --axai-button-color: #92400e;
    --axai-button-text-color: #ffffff;
    --axai-send-button-icon-color: rgba(217, 119, 6, 0.7);
    --axai-send-button-icon-hover-color: #d97706;
    
    /* Footer */
    --axai-footer-link-color: #d97706;
    --axai-footer-button-color: #78350f;
    
    /* Shadows */
    --axai-box-shadow: 0px 0px 18px rgba(217, 119, 6, 0.3);
    --axai-button-hover-shadow: 0px 4px 14px rgba(217, 119, 6, 0.5);
}
```

---

## **10. NEON Theme**

```css
body.axai-theme-neon {
    /* Container & Background */
    --axai-bg-color: #0a0a0a;
    --axai-border-color: #00ffff;
    --axai-hover-bg-color: #1a1a1a;
    
    /* Text Colors - Alle Cyan */
    --axai-text-color: #00ffff;
    --axai-header-text-color: #00ffff;
    --axai-greeting-text-color: #00ffff;
    --axai-timestamp-color: rgba(0, 255, 255, 0.7);
    --axai-bot-name-color: rgba(0, 255, 255, 0.8);
    
    /* Header Elements */
    --axai-header-bg-color: #0a0a0a;
    --axai-header-border-color: rgba(0, 255, 255, 0.5);
    --axai-header-button-color: #00ffff;
    --axai-header-button-hover-bg: #1a1a1a;
    --axai-header-button-hover-color: #00ffff;
    
    /* Message Bubbles */
    --axai-user-msg-bg: #00ffff;
    --axai-user-msg-text: #000000;
    --axai-bot-msg-bg: #1a1a1a;
    --axai-bot-msg-text: #00ffff;
    
    /* Input Area */
    --axai-input-bg-color: #0a0a0a;
    --axai-input-text-color: #00ffff;
    --axai-input-border-color: #00ffff;
    --axai-input-placeholder-color: rgba(0, 255, 255, 0.5);
    --axai-input-focus-border-color: #00ffff;
    
    /* Buttons */
    --axai-button-color: #00ffff;
    --axai-button-text-color: #000000;
    --axai-send-button-icon-color: rgba(0, 255, 255, 0.7);
    --axai-send-button-icon-hover-color: #00ffff;
    
    /* Footer */
    --axai-footer-link-color: #00ffff;
    --axai-footer-button-color: rgba(0, 255, 255, 0.7);
    
    /* Shadows & Effects */
    --axai-box-shadow: 0px 0px 18px #00ffff;
    --axai-button-hover-shadow: 0px 0px 18px rgba(0, 255, 255, 0.8);
    --axai-text-shadow: 0 0 5px currentColor;
}
```

---

## **11. MINIMALIST Theme**

```css
body.axai-theme-minimalist {
    /* Container & Background */
    --axai-bg-color: #ffffff;
    --axai-border-color: #e2e8f0;
    --axai-hover-bg-color: #f8fafc;
    
    /* Text Colors */
    --axai-text-color: #1e293b;
    --axai-header-text-color: #1e293b;
    --axai-greeting-text-color: #94a3b8;
    --axai-timestamp-color: #cbd5e1;
    --axai-bot-name-color: #94a3b8;
    
    /* Header Elements */
    --axai-header-bg-color: #ffffff;
    --axai-header-border-color: rgba(226, 232, 240, 0.5);
    --axai-header-button-color: rgba(30, 41, 59, 0.6);
    --axai-header-button-hover-bg: #f8fafc;
    --axai-header-button-hover-color: rgba(30, 41, 59, 0.9);
    
    /* Message Bubbles */
    --axai-user-msg-bg: #1e293b;
    --axai-user-msg-text: #ffffff;
    --axai-bot-msg-bg: #f8fafc;
    --axai-bot-msg-text: #1e293b;
    
    /* Input Area */
    --axai-input-bg-color: #ffffff;
    --axai-input-text-color: #1e293b;
    --axai-input-border-color: #e2e8f0;
    --axai-input-placeholder-color: rgba(148, 163, 184, 0.6);
    --axai-input-focus-border-color: #1e293b;
    
    /* Buttons */
    --axai-button-color: #1e293b;
    --axai-button-text-color: #ffffff;
    --axai-send-button-icon-color: rgba(30, 41, 59, 0.7);
    --axai-send-button-icon-hover-color: #1e293b;
    
    /* Footer */
    --axai-footer-link-color: #1e293b;
    --axai-footer-button-color: #94a3b8;
    
    /* Shadows */
    --axai-box-shadow: 0px 0px 18px rgba(30, 41, 59, 0.2);
    --axai-button-hover-shadow: 0px 4px 14px rgba(30, 41, 59, 0.3);
}
```

---

## **12. ROSE Theme**

```css
body.axai-theme-rose {
    /* Container & Background */
    --axai-bg-color: #fff1f2;
    --axai-border-color: #fda4af;
    --axai-hover-bg-color: #ffe4e6;
    
    /* Text Colors */
    --axai-text-color: #881337;
    --axai-header-text-color: #ffffff;
    --axai-greeting-text-color: rgba(136, 19, 55, 0.6);
    --axai-timestamp-color: rgba(159, 18, 57, 0.7);
    --axai-bot-name-color: #9f1239;
    
    /* Header Elements */
    --axai-header-bg-color: #e11d48;
    --axai-header-border-color: rgba(253, 164, 175, 0.5);
    --axai-header-button-color: rgba(255, 255, 255, 0.8);
    --axai-header-button-hover-bg: rgba(255, 255, 255, 0.2);
    --axai-header-button-hover-color: #ffffff;
    
    /* Message Bubbles */
    --axai-user-msg-bg: #e11d48;
    --axai-user-msg-text: #ffffff;
    --axai-bot-msg-bg: #ffe4e6;
    --axai-bot-msg-text: #881337;
    
    /* Input Area */
    --axai-input-bg-color: #ffffff;
    --axai-input-text-color: #881337;
    --axai-input-border-color: #fda4af;
    --axai-input-placeholder-color: rgba(136, 19, 55, 0.5);
    --axai-input-focus-border-color: #e11d48;
    
    /* Buttons */
    --axai-button-color: #e11d48;
    --axai-button-text-color: #ffffff;
    --axai-send-button-icon-color: rgba(225, 29, 72, 0.7);
    --axai-send-button-icon-hover-color: #e11d48;
    
    /* Footer */
    --axai-footer-link-color: #e11d48;
    --axai-footer-button-color: #9f1239;
    
    /* Shadows */
    --axai-box-shadow: 0px 0px 18px rgba(225, 29, 72, 0.3);
    --axai-button-hover-shadow: 0px 4px 14px rgba(225, 29, 72, 0.5);
}
```

---

## **13. CYBERPUNK Theme**

```css
body.axai-theme-cyberpunk {
    /* Container & Background */
    --axai-bg-color: #000000;
    --axai-border-color: #ff00ff;
    --axai-hover-bg-color: #1a0033;
    
    /* Text Colors - Cyan für Text, Magenta für Akzente */
    --axai-text-color: #00ffff;
    --axai-header-text-color: #ff00ff;
    --axai-greeting-text-color: #00ffff;
    --axai-timestamp-color: rgba(0, 255, 255, 0.7);
    --axai-bot-name-color: rgba(0, 255, 255, 0.8);
    
    /* Header Elements */
    --axai-header-bg-color: #000000;
    --axai-header-border-color: rgba(255, 0, 255, 0.5);
    --axai-header-button-color: #ff00ff;
    --axai-header-button-hover-bg: #1a0033;
    --axai-header-button-hover-color: #ff00ff;
    
    /* Message Bubbles */
    --axai-user-msg-bg: #ff00ff;
    --axai-user-msg-text: #000000;
    --axai-bot-msg-bg: #1a0033;
    --axai-bot-msg-text: #00ffff;
    
    /* Input Area */
    --axai-input-bg-color: #000000;
    --axai-input-text-color: #00ffff;
    --axai-input-border-color: #ff00ff;
    --axai-input-placeholder-color: rgba(0, 255, 255, 0.5);
    --axai-input-focus-border-color: #ff00ff;
    
    /* Buttons */
    --axai-button-color: #ff00ff;
    --axai-button-text-color: #000000;
    --axai-send-button-icon-color: rgba(255, 0, 255, 0.7);
    --axai-send-button-icon-hover-color: #ff00ff;
    
    /* Footer */
    --axai-footer-link-color: #ff00ff;
    --axai-footer-button-color: rgba(0, 255, 255, 0.7);
    
    /* Shadows & Effects */
    --axai-box-shadow: 0px 0px 18px #ff00ff;
    --axai-button-hover-shadow: 0px 0px 18px rgba(255, 0, 255, 0.8);
    --axai-text-shadow: 0 0 5px currentColor;
}
```

---

## **14. NATURE Theme**

```css
body.axai-theme-nature {
    /* Container & Background */
    --axai-bg-color: #f0fdf4;
    --axai-border-color: #84cc16;
    --axai-hover-bg-color: #dcfce7;
    
    /* Text Colors */
    --axai-text-color: #1a2e05;
    --axai-header-text-color: #ffffff;
    --axai-greeting-text-color: rgba(26, 46, 5, 0.6);
    --axai-timestamp-color: rgba(54, 83, 20, 0.7);
    --axai-bot-name-color: #365314;
    
    /* Header Elements */
    --axai-header-bg-color: #166534;
    --axai-header-border-color: rgba(132, 204, 22, 0.5);
    --axai-header-button-color: rgba(255, 255, 255, 0.8);
    --axai-header-button-hover-bg: rgba(255, 255, 255, 0.2);
    --axai-header-button-hover-color: #ffffff;
    
    /* Message Bubbles */
    --axai-user-msg-bg: #166534;
    --axai-user-msg-text: #ffffff;
    --axai-bot-msg-bg: #dcfce7;
    --axai-bot-msg-text: #1a2e05;
    
    /* Input Area */
    --axai-input-bg-color: #ffffff;
    --axai-input-text-color: #1a2e05;
    --axai-input-border-color: #84cc16;
    --axai-input-placeholder-color: rgba(26, 46, 5, 0.5);
    --axai-input-focus-border-color: #166534;
    
    /* Buttons */
    --axai-button-color: #166534;
    --axai-button-text-color: #ffffff;
    --axai-send-button-icon-color: rgba(132, 204, 22, 0.7);
    --axai-send-button-icon-hover-color: #84cc16;
    
    /* Footer */
    --axai-footer-link-color: #84cc16;
    --axai-footer-button-color: #365314;
    
    /* Shadows */
    --axai-box-shadow: 0px 0px 18px rgba(132, 204, 22, 0.3);
    --axai-button-hover-shadow: 0px 4px 14px rgba(132, 204, 22, 0.5);
}
```

---

## **15. PROFESSIONAL Theme**

```css
body.axai-theme-professional {
    /* Container & Background */
    --axai-bg-color: #ffffff;
    --axai-border-color: #cbd5e1;
    --axai-hover-bg-color: #f8fafc;
    
    /* Text Colors */
    --axai-text-color: #1e293b;
    --axai-header-text-color: #ffffff;
    --axai-greeting-text-color: rgba(100, 116, 139, 0.7);
    --axai-timestamp-color: #94a3b8;
    --axai-bot-name-color: #64748b;
    
    /* Header Elements */
    --axai-header-bg-color: #1e40af;
    --axai-header-border-color: rgba(203, 213, 225, 0.5);
    --axai-header-button-color: rgba(255, 255, 255, 0.8);
    --axai-header-button-hover-bg: rgba(255, 255, 255, 0.2);
    --axai-header-button-hover-color: #ffffff;
    
    /* Message Bubbles */
    --axai-user-msg-bg: #1e40af;
    --axai-user-msg-text: #ffffff;
    --axai-bot-msg-bg: #f8fafc;
    --axai-bot-msg-text: #1e293b;
    
    /* Input Area */
    --axai-input-bg-color: #ffffff;
    --axai-input-text-color: #1e293b;
    --axai-input-border-color: #cbd5e1;
    --axai-input-placeholder-color: rgba(100, 116, 139, 0.6);
    --axai-input-focus-border-color: #1e40af;
    
    /* Buttons */
    --axai-button-color: #1e40af;
    --axai-button-text-color: #ffffff;
    --axai-send-button-icon-color: rgba(30, 64, 175, 0.7);
    --axai-send-button-icon-hover-color: #1e40af;
    
    /* Footer */
    --axai-footer-link-color: #1e40af;
    --axai-footer-button-color: #64748b;
    
    /* Shadows */
    --axai-box-shadow: 0px 0px 18px rgba(30, 64, 175, 0.3);
    --axai-button-hover-shadow: 0px 4px 14px rgba(30, 64, 175, 0.5);
}
```

---

## **16. RETRO Theme**

```css
body.axai-theme-retro {
    /* Container & Background */
    --axai-bg-color: #fef3c7;
    --axai-border-color: #f59e0b;
    --axai-hover-bg-color: #fde68a;
    
    /* Text Colors */
    --axai-text-color: #78350f;
    --axai-header-text-color: #ffffff;
    --axai-greeting-text-color: rgba(120, 53, 15, 0.6);
    --axai-timestamp-color: rgba(146, 64, 14, 0.7);
    --axai-bot-name-color: #92400e;
    
    /* Header Elements */
    --axai-header-bg-color: #d97706;
    --axai-header-border-color: rgba(245, 158, 11, 0.5);
    --axai-header-button-color: rgba(255, 255, 255, 0.8);
    --axai-header-button-hover-bg: rgba(255, 255, 255, 0.2);
    --axai-header-button-hover-color: #ffffff;
    
    /* Message Bubbles */
    --axai-user-msg-bg: #d97706;
    --axai-user-msg-text: #ffffff;
    --axai-bot-msg-bg: #fde68a;
    --axai-bot-msg-text: #78350f;
    
    /* Input Area */
    --axai-input-bg-color: #fef3c7;
    --axai-input-text-color: #78350f;
    --axai-input-border-color: #f59e0b;
    --axai-input-placeholder-color: rgba(120, 53, 15, 0.5);
    --axai-input-focus-border-color: #d97706;
    
    /* Buttons */
    --axai-button-color: #d97706;
    --axai-button-text-color: #ffffff;
    --axai-send-button-icon-color: rgba(245, 158, 11, 0.7);
    --axai-send-button-icon-hover-color: #f59e0b;
    
    /* Footer */
    --axai-footer-link-color: #f59e0b;
    --axai-footer-button-color: #92400e;
    
    /* Shadows */
    --axai-box-shadow: 0px 0px 18px rgba(245, 158, 11, 0.3);
    --axai-button-hover-shadow: 0px 4px 14px rgba(245, 158, 11, 0.5);
}
```

---

## **17. CANDY Theme**

```css
body.axai-theme-candy {
    /* Container & Background */
    --axai-bg-color: #fdf2f8;
    --axai-border-color: #f9a8d4;
    --axai-hover-bg-color: #fce7f3;
    
    /* Text Colors */
    --axai-text-color: #831843;
    --axai-header-text-color: #ffffff;
    --axai-greeting-text-color: rgba(131, 24, 67, 0.6);
    --axai-timestamp-color: rgba(157, 23, 77, 0.7);
    --axai-bot-name-color: #9d174d;
    
    /* Header Elements */
    --axai-header-bg-color: #db2777;
    --axai-header-border-color: rgba(249, 168, 212, 0.5);
    --axai-header-button-color: rgba(255, 255, 255, 0.8);
    --axai-header-button-hover-bg: rgba(255, 255, 255, 0.2);
    --axai-header-button-hover-color: #ffffff;
    
    /* Message Bubbles */
    --axai-user-msg-bg: #db2777;
    --axai-user-msg-text: #ffffff;
    --axai-bot-msg-bg: #fce7f3;
    --axai-bot-msg-text: #831843;
    
    /* Input Area */
    --axai-input-bg-color: #ffffff;
    --axai-input-text-color: #831843;
    --axai-input-border-color: #f9a8d4;
    --axai-input-placeholder-color: rgba(131, 24, 67, 0.5);
    --axai-input-focus-border-color: #db2777;
    
    /* Buttons */
    --axai-button-color: #db2777;
    --axai-button-text-color: #ffffff;
    --axai-send-button-icon-color: rgba(219, 39, 119, 0.7);
    --axai-send-button-icon-hover-color: #db2777;
    
    /* Footer */
    --axai-footer-link-color: #db2777;
    --axai-footer-button-color: #9d174d;
    
    /* Shadows */
    --axai-box-shadow: 0px 0px 18px rgba(219, 39, 119, 0.3);
    --axai-button-hover-shadow: 0px 4px 14px rgba(219, 39, 119, 0.5);
}
```

---

## **Neue CSS-Variablen - Erklärung**

Basierend auf der HTML-Analyse habe ich folgende **neue Variablen** hinzugefügt:

### Neue Variablen:
1. **`--axai-greeting-text-color`** : Für Begrüßungstext (`allm-text-slate-400`)
2. **`--axai-timestamp-color`** : Für Zeitstempel (`allm-text-gray-400`)
3. **`--axai-bot-name-color`** : Für Bot-Name-Label (`allm-text-gray-400`)
4. **`--axai-header-bg-color`** : Für farbige Header (Ocean, Forest, etc.)
5. **`--axai-header-border-color`** : Für Header-Unterkante
6. **`--axai-header-button-color`** : Für Header-Button-Icons
7. **`--axai-header-button-hover-bg`** : Für Header-Button-Hover
8. **`--axai-header-button-hover-color`** : Für Header-Button-Icon-Hover
9. **`--axai-input-text-color`** : Explizit für Input-Text
10. **`--axai-input-border-color`** : Für Input-Container-Rand
11. **`--axai-input-placeholder-color`** : Für Platzhalter-Text
12. **`--axai-input-focus-border-color`** : Für aktiven Input-Rand
13. **`--axai-button-text-color`** : Für Suggestion-Button-Text
14. **`--axai-send-button-icon-color`** : Für Send-Icon
15. **`--axai-send-button-icon-hover-color`** : Für Send-Icon-Hover
16. **`--axai-footer-link-color`** : Für Footer-Links
17. **`--axai-footer-button-color`** : Für "Chat Löschen"-Button
18. **`--axai-box-shadow`** : Für Box-Shadows
19. **`--axai-button-hover-shadow`** : Für Button-Hover-Shadows
20. **`--axai-text-shadow`** : Für Neon/Terminal-Effekte

### Entfernte/Konsolidierte Variablen:
- **`--axai-sponsor-color`** → Ersetzt durch `--axai-footer-link-color` (präziser)

---

**Erstellt:** 2025  
**Version:** 4.0 - Vollständige CSS-Variablen für alle 17 Themes  
**Basis:** Tatsächliche HTML-Klassen und Elemente
