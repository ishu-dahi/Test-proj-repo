//!/usr/bin/env groovy

pipeline {
    agent any

    stages {
        stage('get artifact') {
            steps {
                copyArtifacts filter: 'bhashini.tar.gz', fingerprintArtifacts: true, projectName: 'BHASHINI_NIGHTLY_BUILD'
                
                sh('cd scripts/deploy/ansible && ansible-playbook -i inventory/prod deploy.yml --vault-password-file=~/.ssh/ansible-vault-bhashini/prod -v');
            }
        }
    }
}
