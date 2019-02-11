<table>
    <thead>
    </thead>
    <tbody>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr>
            <td></td>
            <td>Digital Analytics</td>
        </tr>
        <tr>
            <td></td>
            <td>Business Driven Metrics + Tagging Implementation Plan</td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr>
            <td></td>
            <td>Client name: {{$tagBook->client_name}}</td>
            <td>Last update date:</td>
        </tr>
        <tr>
            <td></td>
            <td>Project name: {{$tagBook->project_name}}</td>
            <td>{{$tagBook->updated_at->format('d/m/Y')}}</td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr>
            <td></td>
            <td>{{$tagBook->user_name}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Analista de Digital Analytics</td>
        </tr>
        <tr>
            <td></td>
            <td>{{$tagBook->user_mail}}</td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Ferramentas:</td>
        </tr>
        <tr>
            <td></td>
            <td>Google Analytics: {{$tagBook->ga_code}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Google Tag Manager: {{$tagBook->gtm_code}}</td>
        </tr>
        <tr>
            <td></td>
            <td>URL: {{$tagBook->url}}</td>
        </tr>
    </tbody>
</table>
