/*foreach($order as $item){ ?>
            <tr>
                <td><?php echo $item->id; ?></td>
                <td><?php echo $item->name; ?></td>
                <td><?php echo $item->email; ?></td>
                <td><?php echo $item->order->date; ?></td>
                <td><?php echo $item->address; ?></td>
                <td><?php echo $item->phone; ?></td>
                <td><?php echo $item->note; ?></td>
                <td><?php if($item->order->status == 0) { ?>
                        <span class="btn btn-default" style="padding: 1px 7px">Đơn mới</span>
                    <?php } if($item->order->status == 1) { ?>
                        <span class="btn btn-success" style="padding: 1px 7px">Đã duyệt</span>
                    <?php } if($item->order->status == 2) { ?> 
                        <span class="btn btn-info" style="padding: 1px 7px">Đang giao</span>
                    <?php } if($item->order->status == 3) { ?>
                        <span class="btn btn-primary" style="padding: 1px 7px">Đã giao</span>
                    <?php } if($item->order->status == 4) { ?>
                        <span class="btn btn-danger" style="padding: 1px 7px">Đã hủy</span>
                    <?php } ?>
                </td>
                <td>
                    <a href="<?php echo route('detail-order',$item->order->id); ?>" class=""><span class="btn glyphicon glyphicon-search"></span></a><br>
                    <form action="<?php echo route('delete-order',$item->id); ?>" method="POST">
                        <!-- @csrf
                        @method('DELETE') -->
                        <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')"  type="submit" style="border: none; background: #fff"><span class="glyphicon glyphicon-trash" style="color: #d9534f;"></span></button>
                    </form>
                </td>
            </tr>
            <?php  
        }*/

            public function orderFilterStatus($id){
        $order = Order::with('customer')->where('status',$id)->orderBy('id','desc')->get()->toArray();
        
        
    
}