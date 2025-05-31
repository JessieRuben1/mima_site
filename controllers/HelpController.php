<?php
require_once 'controllers/BaseController.php';

class HelpController extends BaseController {
    public function index() {
        // Get FAQ categories and questions from database
        $faqCategories = [
            'account' => [
                'title' => 'Account & Profile',
                'questions' => [
                    [
                        'question' => 'How do I create an account?',
                        'answer' => 'To create an account, tap the "Sign Up" button on the home screen, enter your mobile number and verify with the OTP sent, complete your profile with basic information, set up your preferred payment methods, and start trading with other users in your community!'
                    ],
                    [
                        'question' => 'How do I reset my password?',
                        'answer' => 'If you\'ve forgotten your password, go to the login screen and tap "Forgot Password", enter the mobile number associated with your account, check your SMS for the verification code, enter the code and create a new password, then log in with your new password.'
                    ]
                ]
            ],
            'trading' => [
                'title' => 'Trading Process',
                'questions' => [
                    [
                        'question' => 'How do I initiate a trade?',
                        'answer' => 'To start a trade, browse products or search for items you want, when you find an item, tap "Trade for This", select items from your inventory to offer in exchange, add a message explaining your offer, and submit your trade request and wait for the other user to respond.'
                    ],
                    [
                        'question' => 'What happens when someone accepts my trade?',
                        'answer' => 'When your trade is accepted, you\'ll receive a notification that your trade was accepted, the items involved will be temporarily locked in both accounts, you\'ll need to arrange a meetup or delivery with the other trader, after both parties confirm the exchange, the trade is complete, and items will be permanently transferred to the new owners.'
                    ]
                ]
            ]
        ];

        $this->render('help/index', [
            'page_title' => 'Help Center',
            'faqCategories' => $faqCategories
        ]);
    }

    public function search() {
        if (!isset($_GET['query'])) {
            $this->json(['error' => 'No search query provided']);
        }

        $query = $_GET['query'];
        // TODO: Implement actual search functionality in database
        $results = [
            [
                'title' => 'How to create an account',
                'category' => 'Account & Profile',
                'url' => '#account-help'
            ],
            [
                'title' => 'How to initiate a trade',
                'category' => 'Trading Process',
                'url' => '#trading-help'
            ]
        ];

        $this->json($results);
    }
} 