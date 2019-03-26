<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
            'name' => 'Giày Nike Air Max 270 White Court',
            'slug' => 'giay-nike-air-max-270-white-court',
            'description' => 'là mẫu giày phiên bản Giới Hạn đối với dòng giày AirMax1.Với công nghệ đế Air tích hợp dưới đế giúp cho bạn khi di chuyển nhiều được êm ái và nhẹ nhàng hơn. Với phiên bản giới hạn chỉ có vài trăm đôi được sản xuất nên cái tên Nike AirMax1 Just Do It không ít người săn đón và về được Việt Nam vơi số lượng cực ít!!!',
            'price' => 2500000,
            'sale' => 15,
            'status' => 1,
            'category_id' => 1,
            'brand_id' => 2,
            
        ],[
            'name' => 'Giày Adidas Yung 1 "Cloud White"',
            'slug' => 'giay-adidas-yung-1-cloud-white',
            'description' => 'được xem như là một "người anh" trong đại gia đình BOOST. Dù được ra mắt từ lâu nhưng sức hút của Ultra BOOST chưa bao giờ giảm sút. Không chỉ sở hữu cho mình những công nghệ hiện đại bậc nhất của Adidas, sản phẩm còn sở hữu vẻ bề ngoài tràn đầy năng lượng và cứng cáp. Bạn vừa có thể mang để tập luyện thể thao cũng vừa có thể mang đi chơi mà vẫn không kém sự nổi bật. Thêm vào đó, Ultra BOOST 4.0 còn sở hữu một mức giá ưu đãi hơn rất nhiều so với phiên bản Ultra BOOST 2.0. Liên hệ shop ngay nhé!',
            'price' => 2800000,
            'sale' => 15,
            'status' => 1,
            'category_id' => 1,
            'brand_id' => 1,
        ],
        [
            'name' => 'Giày Nike Air Max 270 "Triple Black"',
            'slug' => 'giay-nike-air-max-270-triple-black',
            'description' => 'Giống như hầu hết các dòng sản phẩm của New Balance, sản phẩm sở hữu thiết kế gọn nhẹ, chất liệu vải ôm sát cả bàn chân mang lại cảm giác thoải mái cho các tình yếu nhé!',
            'price' => 3000000,
            'sale' => 15,
            'status' => 1,
            'category_id' => 2,
            'brand_id' => 2,
        ],
        [
            'name' => 'Giày Adidas Ultra BOOST 2.0 "Gold"',
            'slug' => 'giay-adidas-superstar-white-blue-gold-stamp',
            'description' => 'Mẫu giày Nike huyền thoại vừa cập bến shop, Nike Roshe one luôn là mẫu bán chạy nhất của dòng giày casual nha các bạn.

            Form giày chuẩn và phù hợp cho mọi lứa tuổi cũng như mọi hoạt động thể thao !',
            'price' => 5500000,
            'sale' => 15,
            'status' => 1,
            'category_id' => 1,
            'brand_id' => 1,
        ],
        [
            'name' => 'Giày Adidas Superstar "White/Blue" Gold Stamp',
            'slug' => 'giay-adidas-superstar-white-blue-gold-stamp',
            'description' => 'được xem như là một "người anh" trong đại gia đình BOOST. Dù được ra mắt từ lâu nhưng sức hút của Ultra BOOST chưa bao giờ giảm sút. Không chỉ sở hữu cho mình những công nghệ hiện đại bậc nhất của Adidas, sản phẩm còn sở hữu vẻ bề ngoài tràn đầy năng lượng và cứng cáp. Bạn vừa có thể mang để tập luyện thể thao cũng vừa có thể mang đi chơi mà vẫn không kém sự nổi bật. Thêm vào đó, Ultra BOOST 4.0 còn sở hữu một mức giá ưu đãi hơn rất nhiều so với phiên bản Ultra BOOST 2.0. Liên hệ shop ngay nhé!',
            'price' => 1800000,
            'sale' => 15,
            'status' => 1,
            'category_id' => 3,
            'brand_id' => 1,
        ],
        [
            'name' => 'Giày Nike Air Max 1 Just Do It Collection"',
            'slug' => 'giay-adidas-superstar-white-blue-gold-stamp',
            'description' => 'được xem như là một "người anh" trong đại gia đình BOOST. Dù được ra mắt từ lâu nhưng sức hút của Ultra BOOST chưa bao giờ giảm sút. Không chỉ sở hữu cho mình những công nghệ hiện đại bậc nhất của Adidas, sản phẩm còn sở hữu vẻ bề ngoài tràn đầy năng lượng và cứng cáp. Bạn vừa có thể mang để tập luyện thể thao cũng vừa có thể mang đi chơi mà vẫn không kém sự nổi bật. Thêm vào đó, Ultra BOOST 2.0 còn sở hữu một mức giá ưu đãi hơn rất nhiều so với phiên bản Ultra BOOST 3.0. Liên hệ shop ngay nhé!',
            'price' => 1800000,
            'sale' => 15,
            'status' => 1,
            'category_id' => 2,
            'brand_id' => 2,        ],
        [
            'name' => 'Giày Adidas Superstar "White/Blue" Gold Stamp',
            'slug' => 'giay-adidas-superstar-white-blue-gold-stamp',
            'description' => 'Mẫu giày Nike chính hãng mới nhất với phối màu lạ mắt 😎😎 Quan trọng là giá vẫn rất mềm cho ae nhé! 🤤🤤
            Đây là một trong những dòng giày Nike mới được sản xuất dựa trên công nghệ đế Air nổi tiếng, với thiết kế hiện đại và cực kỳ êm ái !',
            'price' => 2300000,
            'sale' => 15,
            'status' => 1,
            'category_id' => 3,
            'brand_id' => 1,
        ],
        [
            'name' => 'Giày Adidas Superstar "White/Blue" Gold Stamp A',
            'slug' => 'giay-adidas-superstar-white-blue-gold-stamp',
            'description' => 'Giống như hầu hết các dòng sản phẩm của New Balance, sản phẩm sở hữu thiết kế gọn nhẹ, chất liệu vải ôm sát cả bàn chân mang lại cảm giác thoải mái cho các tình yếu nhé!',
            'price' => 2300000,
            'sale' => 15,
            'status' => 1,
            'category_id' => 3,
            'brand_id' => 1,
        ]
    ]);
    }
}
