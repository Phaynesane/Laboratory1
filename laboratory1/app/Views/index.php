<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
    <body>
        <div class="container mt-2 col-8">
            <form class="row g-4"action="/save" method="post">    

                <input type = "hidden" name = "id" value = "<?=$Infoedit['id']??''?>">
                <div class="col-2" style="margin-top: 50px;">
                    <label for="studentID" class="form-label">StudentID</label>
                    <input type="text" class="form-control" id="studentID"  name = "StudID" placeholder= "MCC" value = "<?=$Infoedit['StudID']??''?>">
                </div>
                <div class="col-12">
                    <label for="studentName" class="form-label">Student Name</label>
                    <input type="text" class="form-control" id="studentName"  name = "StudName" placeholder= "Enter Name" value = "<?=$Infoedit['StudName']??''?>">
                </div>
                <div class="col-2">
                    <label for="studentGender" class="form-label">Student Gender</label>
                    <select id="studentGender" class="form-select" name ="StudGender">
                        <option value="" <?= empty($Infoedit['StudGender']) ? 'selected':''?>> Choose Gender</option>
                        <?php foreach ($gender as $gender) :?>
                            <option value="<?= $gender ?>" <?= ($gender == ($Infoedit['StudGender'] ?? '')) ?'selected':''?>>
                            <?= $gender?></option>
                        <?php endforeach;?>
                    </select> 
                </div>
                <div class="col-4">
                    <label for ="studentCourse" class="form-label">Student Course</label>
                    <input type="text" class="form-control" id="studentCourse" name = "StudCourse" placeholder="Enter Course" value = "<?=$Infoedit['StudCourse']??''?>">
                </div>
                <div class="col-md-2">
                    <label for="studSection" class="form-label">Section</label>

                    <select id="studentSection" class="form-select" name = "StudSection">
                        <option value="" <?= empty($Infoedit['StudSection']) ? 'selected' : ''?>>Select Section</option>
                        <?php foreach ($sections as $section):?>
                        <option value="<?= $section['Section']?>" <?=($section['Section'] == ($Infoedit['StudSection'] ?? ''))? 'selected' : ''?>>
                            <?=$section['Section'] ?>
                        </option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col-md-3">
                    
                    <label for="inputState" class="form-label">Year Level</label>
                    <select id="inputState" class="form-select" name = "StudYear">
                        <option value="" <?= empty($Infoedit['StudYear'])?'selected' : ''?>>Select Year Level</option>
                        <option value="1st Year" <?= ($Infoedit['StudYear']??'') === '1st Year'?'selected': ''?>>1st Year</option>
                        <option value="2nd Year" <?= ($Infoedit['StudYear']??'') === '2nd Year'?'selected': ''?>>2nd Year</option>
                        <option value="3rd Year" <?= ($Infoedit['StudYear']??'') === '3rd Year'?'selected': ''?>>3rd Year</option>
                        <option value="4th Year" <?= ($Infoedit['StudYear']??'') === '4th Year'?'selected': ''?>>4th Year</option>
                    </select>
                </div>

                <div class="col-12 d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary col-2">Save</button>
                </div>
            </form>
        </div>        
        <table class="table table-dark mb-0 mt-4 ">
            <thead style="background-color: #393939;">
                <tr>
                    <th style="color: #7FFF00; text-align: center;" scope="col">StudentID</th>
                    <th style="color: #7FFF00;text-align: center;" scope="col">Student Name</th>
                    <th style="color: #7FFF00;text-align: center;" scope="col">Student Gender</th>
                    <th style="color: #7FFF00;text-align: center;" scope="col">Student Course</th>
                    <th style="color: #7FFF00;text-align: center;" scope="col">Section</th>
                    <th style="color: #7FFF00;text-align: center;" scope="col">Year Level</th>
                    <th style="color: #7FFF00;text-align: center;" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student):?>
                <tr>
                    <td class="text-center"><?= $student['StudID']?></td>
                    <td class="text-center"><?= $student['StudName']?></td>
                    <td class="text-center"><?= $student['StudGender']?></td>
                    <td class="text-center"><?= $student['StudCourse']?></td>
                    <td class="text-center"><?= $student['StudSection']?></td>
                    <td class="text-center"><?= $student['StudYear']?></td>
                    <td class="text-center">
                        <div class="text-center">
                            <a href="/edit/<?= $student['id']?>"type="button" class="btn btn-primary">Edit</a>
                            <a href="/delete/<?= $student['id']?>"type="button" class="btn btn-danger">Delete</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            </table>
    </body>
</html>