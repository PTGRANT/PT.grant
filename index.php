<?php
// index.php - PT GRANT Landing & Application Status Portal
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
    <style>
        .grant-card {
            cursor: pointer;
            user-select: none;
        }
    </style>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex flex-col font-sans">

    <!-- Header Navigation -->
    <header class="bg-slate-800 border-b border-slate-700 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <div class="flex items-center space-x-3 cursor-pointer" onclick="showSection('landing-section')">
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

        <!-- 1. LANDING SECTION: GRANT OPTIONS -->
        <section id="landing-section" class="space-y-8">
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <span class="bg-indigo-500/10 text-indigo-400 text-sm font-semibold px-4 py-1.5 rounded-full border border-indigo-500/20">Official Relief Program</span>
                <h2 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight">Financial Assistance Programs</h2>
                <p class="text-slate-400 text-lg">Select an assistance program below to begin your official PT GRANT application process.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pt-6">
                
                <!-- Personal Loan Assistance -->
                <div onclick="openApplicationForm('Personal Loan Assistance')" class="grant-card bg-slate-800/80 hover:bg-slate-800 border border-slate-700 hover:border-indigo-500/50 rounded-2xl p-6 transition-all duration-300 transform hover:-translate-y-1 group shadow-xl">
                    <div class="w-14 h-14 bg-blue-500/10 text-blue-400 rounded-xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform mb-4">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-indigo-400 transition-colors">Personal Loan Assistance</h3>
                    <p class="text-slate-400 text-sm mb-4">Direct funding support for personal debts and immediate financial relief.</p>
                    <span class="text-indigo-400 text-sm font-semibold inline-flex items-center group-hover:translate-x-1 transition-transform">
                        Apply Now <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                    </span>
                </div>

                <!-- Mortgage Loan Assistance -->
                <div onclick="openApplicationForm('Mortgage Loan Assistance')" class="grant-card bg-slate-800/80 hover:bg-slate-800 border border-slate-700 hover:border-indigo-500/50 rounded-2xl p-6 transition-all duration-300 transform hover:-translate-y-1 group shadow-xl">
                    <div class="w-14 h-14 bg-emerald-500/10 text-emerald-400 rounded-xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform mb-4">
                        <i class="fa-solid fa-house-circle-check"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-indigo-400 transition-colors">Mortgage Loan Assistance</h3>
                    <p class="text-slate-400 text-sm mb-4">Relief programs for home loans, principal reductions, and foreclosure prevention.</p>
                    <span class="text-indigo-400 text-sm font-semibold inline-flex items-center group-hover:translate-x-1 transition-transform">
                        Apply Now <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                    </span>
                </div>

                <!-- Credit Card Payoff Assistance -->
                <div onclick="openApplicationForm('Credit Card Payoff Assistance')" class="grant-card bg-slate-800/80 hover:bg-slate-800 border border-slate-700 hover:border-indigo-500/50 rounded-2xl p-6 transition-all duration-300 transform hover:-translate-y-1 group shadow-xl">
                    <div class="w-14 h-14 bg-purple-500/10 text-purple-400 rounded-xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform mb-4">
                        <i class="fa-solid fa-credit-card"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-indigo-400 transition-colors">Credit Card Payoff Assistance</h3>
                    <p class="text-slate-400 text-sm mb-4">Debt consolidation grants designed to eliminate high-interest credit card debt.</p>
                    <span class="text-indigo-400 text-sm font-semibold inline-flex items-center group-hover:translate-x-1 transition-transform">
                        Apply Now <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                    </span>
                </div>

                <!-- Small Business Assistance -->
                <div onclick="openApplicationForm('Small Business Assistance')" class="grant-card bg-slate-800/80 hover:bg-slate-800 border border-slate-700 hover:border-indigo-500/50 rounded-2xl p-6 transition-all duration-300 transform hover:-translate-y-1 group shadow-xl">
                    <div class="w-14 h-14 bg-amber-500/10 text-amber-400 rounded-xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform mb-4">
                        <i class="fa-solid fa-store"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-indigo-400 transition-colors">Small Business Assistance</h3>
                    <p class="text-slate-400 text-sm mb-4">Grants to expand, stabilize, or launch small business operations and payroll.</p>
                    <span class="text-indigo-400 text-sm font-semibold inline-flex items-center group-hover:translate-x-1 transition-transform">
                        Apply Now <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                    </span>
                </div>

                <!-- Home Grant Assistance -->
                <div onclick="openApplicationForm('Home Grant Assistance')" class="grant-card bg-slate-800/80 hover:bg-slate-800 border border-slate-700 hover:border-indigo-500/50 rounded-2xl p-6 transition-all duration-300 transform hover:-translate-y-1 group shadow-xl">
                    <div class="w-14 h-14 bg-rose-500/10 text-rose-400 rounded-xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform mb-4">
                        <i class="fa-solid fa-house-chimney-window"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-indigo-400 transition-colors">Home Grant Assistance</h3>
                    <p class="text-slate-400 text-sm mb-4">Housing repair, energy efficiency, and first-time homebuyer support grants.</p>
                    <span class="text-indigo-400 text-sm font-semibold inline-flex items-center group-hover:translate-x-1 transition-transform">
                        Apply Now <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                    </span>
                </div>

                <!-- Doorstep Delivery Assistance -->
                <div onclick="openApplicationForm('Doorstep Delivery Assistance')" class="grant-card bg-slate-800/80 hover:bg-slate-800 border border-slate-700 hover:border-indigo-500/50 rounded-2xl p-6 transition-all duration-300 transform hover:-translate-y-1 group shadow-xl">
                    <div class="w-14 h-14 bg-cyan-500/10 text-cyan-400 rounded-xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform mb-4">
                        <i class="fa-solid fa-truck-ramp-box"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-indigo-400 transition-colors">Doorstep Delivery Assistance</h3>
                    <p class="text-slate-400 text-sm mb-4">Essential aid, checks, and physical grant package delivery services.</p>
                    <span class="text-indigo-400 text-sm font-semibold inline-flex items-center group-hover:translate-x-1 transition-transform">
                        Apply Now <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                    </span>
                </div>

            </div>
        </section>

        <!-- 2. APPLICATION FORM SECTION -->
        <section id="application-section" class="hidden max-w-3xl mx-auto">
            <button type="button" onclick="showSection('landing-section')" class="mb-6 text-slate-400 hover:text-white flex items-center space-x-2 transition-colors">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Back to Grant Options</span>
            </button>

            <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 sm:p-10 shadow-2xl">
                <div class="mb-8 pb-6 border-b border-slate-700">
                    <span id="selected-grant-badge" class="bg-indigo-500/20 text-indigo-400 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Personal Loan Assistance</span>
                    <h2 class="text-3xl font-extrabold text-white mt-2">Application Form</h2>
                    <p class="text-slate-400 text-sm mt-1">Please provide accurate personal and financial details to process your PT GRANT request.</p>
                </div>

                <form id="grant-app-form" onsubmit="handleFormSubmit(event)" class="space-y-6">
                    <input type="hidden" id="app_grant_type" value="Personal Loan Assistance">

                    <div>
                        <label class="block text-sm font-semibold text-slate-300 mb-2">Application Type *</label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="flex items-center justify-center p-3 border border-slate-700 rounded-xl bg-slate-900/50 cursor-pointer hover:border-indigo-500">
                                <input type="radio" name="applicant_type" value="personal" checked onclick="toggleApplicantFields('personal')" class="text-indigo-600">
                                <span class="ml-2 text-sm font-medium text-white">Personal</span>
                            </label>
                            <label class="flex items-center justify-center p-3 border border-slate-700 rounded-xl bg-slate-900/50 cursor-pointer hover:border-indigo-500">
                                <input type="radio" name="applicant_type" value="business" onclick="toggleApplicantFields('business')" class="text-indigo-600">
                                <span class="ml-2 text-sm font-medium text-white">Business</span>
                            </label>
                        </div>
                    </div>

                    <div id="business-field" class="hidden">
                        <label class="block text-sm font-semibold text-slate-300 mb-2">Registered Business Name *</label>
                        <input type="text" id="business_name" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="e.g. Apex Global Solutions LLC">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">First Name *</label>
                            <input type="text" required id="first_name" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="John">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">Middle Name</label>
                            <input type="text" id="middle_name" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="Edward">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">Last Name *</label>
                            <input type="text" required id="last_name" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="Doe">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">Email Address *</label>
                            <input type="email" required id="email" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="john@example.com">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">Phone Number *</label>
                            <input type="tel" required id="phone" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="(555) 000-0000">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">Age *</label>
                            <input type="number" required id="age" min="18" max="120" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="30">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">Sex / Gender *</label>
                            <select required id="sex" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500">
                                <option value="">Select Option</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other / Non-Binary</option>
                            </select>
                        </div>
                    </div>

                    <!-- Structured Address Fields -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">Address Line 1 *</label>
                            <input type="text" required id="address1" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="123 Financial Freedom Way">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">Address Line 2 (Apt / Suite / Unit)</label>
                            <input type="text" id="address2" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="Suite 4B">
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-300 mb-2">City *</label>
                                <input type="text" required id="city" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="New York">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-300 mb-2">State *</label>
                                <input type="text" required id="state" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="NY">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-300 mb-2">Zip Code *</label>
                                <input type="text" required id="zip_code" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="10001">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">Current Employer *</label>
                            <input type="text" required id="employer" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="Company Name">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">Annual / Monthly Salary ($) *</label>
                            <input type="number" required id="salary" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="50000">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">Monthly Rent/Mortgage ($) *</label>
                            <input type="number" required id="rent_amount" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="1200">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">Last 4 Digits of SSN *</label>
                            <input type="text" required id="ssn_last4" maxlength="4" pattern="\d{4}" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500" placeholder="1234">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">Ever Filed Bankruptcy? *</label>
                            <select required id="bankruptcy" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500">
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-4 rounded-xl transition-all shadow-lg text-lg">
                        Submit Official Application
                    </button>
                </form>
            </div>
        </section>

        <!-- 3. SUCCESS VIEW -->
        <section id="success-section" class="hidden max-w-xl mx-auto text-center py-12">
            <div class="bg-slate-800 border border-slate-700 rounded-2xl p-8 sm:p-10 shadow-2xl space-y-6">
                <div class="w-20 h-20 bg-emerald-500/10 text-emerald-400 rounded-full flex items-center justify-center text-4xl mx-auto border border-emerald-500/20">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <h2 class="text-3xl font-extrabold text-white">Thank You!</h2>
                <p class="text-slate-300">Your grant application has been successfully created and submitted to the PT GRANT evaluation board.</p>
                
                <div class="bg-slate-900 border border-slate-700 p-4 rounded-xl">
                    <p class="text-xs uppercase tracking-wider text-slate-400 font-bold mb-1">Your Unique Application Reference</p>
                    <div id="generated-app-num" class="text-2xl font-black text-indigo-400 tracking-widest">PT-999999</div>
                </div>

                <button type="button" onclick="goToStatusWithAppNum()" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3.5 rounded-xl transition-all shadow-lg">
                    Go to Check Application Status
                </button>
            </div>
        </section>

        <!-- 4. LOGIN TO CHECK STATUS -->
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
                        <input type="text" required id="login_name" class="w-full bg-slate-900 border border-slate-700 rounded-lg
