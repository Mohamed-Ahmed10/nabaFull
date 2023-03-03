<table>
    <thead>
        <tr>
            <th>Section</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Country</th>
            <th>Company Name</th>
            <th>Notices</th>
        </tr>
    </thead>
    <tbody>
        @isset($contacts)
            @foreach($contacts as $contact)
            <tr>
                <?php 
                    $section_no = '( --- )';
                    if($contact->section_no == 1){ $section_no = 'products ( ' . $contact->sectionable_name .' )'  ; }
                    elseif($contact->section_no == 2){ $section_no = 'articles ( ' . $contact->sectionable_name .' )'  ; } 
                    elseif($contact->section_no == 3){ $section_no = 'webinars ( ' . $contact->sectionable_name .' )'  ; } 
                    elseif($contact->section_no == 4){ $section_no = 'services ( ' . $contact->sectionable_name .' )'  ; } 
                    elseif($contact->section_no == 5){ $section_no = 'trainings ( ' . $contact->sectionable_name .' )'  ; } 
                ?> 
                <td>{{$section_no}}</td>
                <td>{{$contact->name}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->phone}}</td>
                <td>{{$contact->country}}</td>
                <td>{{$contact->company_name}}</td>
                <td>{{$contact->notes}}</td>
            </tr>
            @endforeach
        @endisset
    </tbody>
</table>
