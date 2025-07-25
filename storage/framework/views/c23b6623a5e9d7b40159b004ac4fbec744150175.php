<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-size: 12px;
            font-family: 'Poppins' , sans-serif;
            font-style: normal;
            color:#404040;
            line-height: 18px;
        }
        table {
            border-collapse: collapse;
            border: 1px solid #000;
        }
        table tr td {
            padding: 3px 0px!important; 
        }
        p {
            margin-bottom: 0px; margin: 0.3rem 0; 
        } 
        #info tr td {
            width: 50%;
        }
        #vehicle-details {
            width:100%;
            margin-bottom:0px;
        }
        .job-details {
            width:100%;
            margin-bottom:20px;
        }
        .job-details tr td {
            border: 1px solid #000;
            padding: 3px;
        }
        #vehicle-details tr td {
            border: 1px solid #000;
            padding: 3px;
        }
        </style>
    </head>
    <body>
        <div style="text-align:center;margin-bottom:15px;font-weight:bold;font-size:20px;">
            Job Card
        </div>
        <table id="info" style="width:100%;margin-bottom:7px;">
            <tr>
                <td>
                    <img src="<?php echo e(asset('images/logo/logo_2.JPG')); ?>" style="margin:10px;height:55px;" alt='Logo'>
                    <div style="padding-left:5px;">
                        <span style="font-weight:bold;">RMS AUTO REPAIRS</span><br>
                        <span>31 Nevin Dr</span><br>
                        <span>Thomastown VIC 3074</span><br>
                        <span>M: 0410384019   P: 03 94246843</span>
                    </div>
                </td>
                <td style="border-left:none;position:relative;">
                    <div style="padding-left:150px;margin-bottom:8px;">Date: <?php echo e(date('d-m-Y')); ?></div>
                    <div style="padding-left:150px;">Name: <?php echo e($vehicle['customer']['name']); ?></div>
                    <div style="padding-left:150px;">Address: <?php echo e($vehicle['customer']['address']); ?> <?php echo e($vehicle['customer']['suburb']); ?> <?php echo e($vehicle['customer']['state']); ?> <?php echo e($vehicle['customer']['postcode']); ?></div>
                    <div style="padding-left:150px;">Phone: <?php echo e($vehicle['customer']['phoneno']); ?></div>
                    <div style="padding-left:150px;">Email: <?php echo e($vehicle['customer']['email'] ?? 'N/A'); ?></div>
                </td>
            </tr>
        </table>
        <table id="vehicle-details">
            <tr>
                <td style="position:relative;width:25%;"><span style="padding-left:5px;">Rego: <?php echo e($vehicle['rego']); ?></span></td>
                <td style="position:relative;width:25%;"><span style="padding-left:5px;">Year: <?php echo e($vehicle['year']); ?></div></td>
                <td style="position:relative;width:25%;"><span style="padding-left:5px;">Make: <?php echo e($vehicle['make']); ?></div></td>
                <td style="position:relative;width:25%;"><span style="padding-left:5px;">Model: <?php echo e($vehicle['model']); ?></div></td>
            </tr>
            <tr>
                <td style="position:relative;width:25%;"><span style="padding-left:5px;">Colour: <?php echo e($vehicle['colour']); ?></span></td>
                <td style="position:relative;width:25%;"><span style="padding-left:5px;">Type: <?php if($vehicle['transmission'] == 'A'): ?> Automatic <?php else: ?> Manual <?php endif; ?></span></td>
                <td style="position:relative;width:25%;"><span style="padding-left:5px;">Vin: <?php echo e($vehicle['vin_no']); ?></span></td>
                <td style="position:relative;width:25%;"><span style="padding-left:5px;">Odometer: <?php echo e($vehicle['odometer']); ?></span></td>
            </tr>
        </table>
        <table class="job-details">
            <tr>
                <td style="position:relative;font-weight:bold;text-align:center;width:25px;">#</td>
                <td style="position:relative;font-weight:bold;text-align:center;">Job Description</td>
            </tr>
            <tr>
                <td style="position:relative;text-align:center;padding:3px;"><span>01</span></td>
                <td style="position:relative;text-align:left;padding:3px;font-weight:bold"><span style="padding-left:3px;">Concern/Repairs:</span></td>
            </tr>
            <?php
                $count = 26;
                //dump($count);
                $concerns = explode(',', $vehicle['details']);
                $count = $count - count($concerns);
                //dump(count($concerns));
                //dump($count);
            ?>
            <?php $__currentLoopData = $concerns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $concern): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="position:relative;height:16px;padding:3px;"></td>
                    <td style="position:relative;height:16px;padding:3px;"><span style="padding-left:3px;"><?php echo e($concern); ?></span></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php for($i=0;$i<$count;$i++): ?>
            <tr>
                <td style="position:relative;height:16px;"></td>
                <td style="position:relative;height:16px;"></td>
            </tr>
            <?php endfor; ?>
        </table>
        <div style="margin-bottom:25px;">
            *By signing this job card, I/we have read the above terms and conditions of Trade and having read and understood them. I also authorize the above service/repairs as the owner/agent.
        </div>
        <table style="width:100%;border:none;margin-bottom:10px;">
            <tr>
                <td style="position:relative;font-weight:bold;text-align:left;width:50%;padding:3px;">Customer signature: ...........................................</td>
                <td style="position:relative;font-weight:bold;width:100px;text-align:right;width:50%;padding:3px;">Technician signature: ...........................................</td>
            </tr>
        </table>
        <div style="margin-bottom:15px;text-align:center;font-weight:bold;font-size:15px;">
            Workshop Details
        </div>
        <table class="job-details">
            <tr>
                <td style="position:relative;font-weight:bold;text-align:center;width:25px;">#</td>
                <td style="position:relative;font-weight:bold;text-align:center;">Item/Material Used</td>
                <td style="position:relative;font-weight:bold;width:100px;text-align:center;">Cost $</td>
            </tr>
            <tr>
                <td style="position:relative;height:16px;"></td>
                <td style="position:relative;height:16px;"></td>
                <td style="position:relative;height:16px;"></td>
            </tr>
            <tr>
                <td style="position:relative;text-align:center;padding:3px;"></td>
                <td style="position:relative;text-align:left;padding:3px;font-weight:bold;">
                    <span style="padding-left:3px">Work completed:</span>
                </td>
                <td style="position:relative;width:100px;text-align:center;padding:3px;"></td>
            </tr>
            <?php for($i=0;$i<19;$i++): ?>
            <tr>
                <td style="position:relative;height:16px;"></td>
                <td style="position:relative;height:16px;"></td>
                <td style="position:relative;width:100px;height:16px;"></td>
            </tr>
            <?php endfor; ?>
            <tr>
                <td style="position:relative;text-align:center;padding:3px;"></td>
                <td style="position:relative;text-align:left;padding:3px;font-weight:bold;">
                    Scan tool diagnosis:
                </td>
                <td style="position:relative;width:100px;text-align:center;padding:3px;"></td>
            </tr>
            <?php for($i=0;$i<19;$i++): ?>
            <tr>
                <td style="position:relative;height:16px;"></td>
                <td style="position:relative;height:16px;"></td>
                <td style="position:relative;width:100px;height:16px;"></td>
            </tr>
            <?php endfor; ?>
        </table>        
    </body>
</html><?php /**PATH /home/rmsautoa/public_html/IMS/resources/views/jobcards/repairs.blade.php ENDPATH**/ ?>