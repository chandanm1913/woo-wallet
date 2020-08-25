add_filter('is_valid_payment_through_wallet', '__return_false');
add_filter('woo_wallet_partial_payment_amount', 'woo_wallet_partial_payment_amount_callback', 10);

function woo_wallet_partial_payment_amount_callback($amount) {
    if (sizeof(wc()->cart->get_cart()) > 0) {
        $cart_total = get_woowallet_cart_total();
        $partial_payment_amount = ($cart_total * 20) / 100;
        if ($amount >= $partial_payment_amount) {
            $amount = $partial_payment_amount;
        }
    }
    return $amount;
}
Thank you.
